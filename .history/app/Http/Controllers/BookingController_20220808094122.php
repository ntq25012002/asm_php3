<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Models\Bookings;
use App\Models\Customers;
use App\Http\Requests\RoomRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    protected $rooms;
    protected $roomTypes;
    protected $bookings;
    protected $customers;
    protected $v;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes,Bookings $bookings,Customers $customers) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
        $this->bookings = $bookings;
        $this->customers = $customers;
        $this->v = [];
    }

    public function checkCalendar($id,Request $request) {
        // dd($request->all());
        if( isset($request->checkin) && isset($request->checkout)) {
            $data = [
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
            ];
            $res = $this->bookings->checkCalendar($id,$data);
            // dd(count($res));
            if(count($res) > 0) {
                return redirect()->route('check-calendar',['id' => $id])->with('err','Phòng đã được đặt trong khoảng thời gian này. Vui lòng chọn khoảng thời gian khác!');
            }else if((count($res) <= 0)){
                // Session::forget();
                $checkin = strtotime($request->checkin);
                $checkout = strtotime($request->checkout);
                $datediff = abs($checkin - $checkout);
                $nights = 1 + $datediff / (60*60*24);
                // dd($nights);
                $roomBooking = [
                    'room_id' => $id,
                    'nights' => $nights,
                    'checkin' => $request->checkin,
                    'checkout' => $request->checkout,
                ];
                if(Session::has('roomBooking')) {
                    Session::forget('roomBooking');
                }
                    Session::put('roomBooking',$roomBooking);
                
                return redirect()->route('booking',['id' => $id]);
            }
        }else{
            return redirect()->route('check-calendar',['id' => $id])->with('err','Vui lòng chọn thời gian đặt phòng!');
        }
    }

    public function getBooking($id) {
        // dd($request->all());
        // dd(Session::get('roomBooking'));
        if(Session::has('roomBooking')) {
            $roomBooking = Session::get('roomBooking');
            // dd($roomBooking);
            $roomTypes = $this->roomTypes->loadlist();
            $room = $this->rooms->loadOne($id);
            if($room) {
                $roomType = $this->roomTypes->loadOne($room->room_type_id);
                $this->v['roomTypes'] = $roomTypes;
                $this->v['roomType'] = $roomType;
                $this->v['room'] = $room;
                return view('client.booking',$this->v);
            }else{
                return redirect()->route('room-list')->with('err','Không xác định phòng');
                // return redirect()->back()->with('error','Chưa xác định thông tin phòng');
            }
        }else{
            return redirect()->route('room-list')->with('err','Không xác định phòng');
            // return redirect()->back()->with('error','Chưa xác định thông tin phòng');
        }
    }

    public function postBooking($id,Request $request) {
        // dd($request->all());
        try {
            // DB::beginTransaction();
                $dataCustomer = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone,
                ];
                $res = $this->customers->saveNew($dataCustomer);
                if(!empty($res)) {
                    if(Session::has('roomBooking')) {
                        $roomBooking = Session::get('roomBooking');
                        $room = $this->rooms->loadOne($id);
                        // $roomType = $this->roomTypes->loadOne($room->room_type_id);
                        $dataBooking = [
                            'room_id' => $roomBooking['room_id'],
                            'customer_id' =>$res->id,
                            'price' =>$roomBooking['nights']*$room->price,
                            'payment' => 0,
                            'checkin' =>  $roomBooking['checkin'],
                            'checkout' =>  $roomBooking['checkout'],
                            'note' =>  $request->note ?? null,
                        ];

                        $resBook = $this->bookings->saveNew($dataBooking);
                        if(!empty($resBook)) {
                            DB::commit();
                            return redirect()->route('confirmation',['id' => $id])->with('msg','Đặt phòng thành công!');
                        }else{
                            return redirect()->back()->with('err','Lỗi đặt phòng');
                        } 
                    }else{
                        return redirect()->back()->with('err','Chưa xác định thông tin phòng');
                    }
                }
            return redirect()->route('confirmation',['id' => $id]);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back();
        }
    }
    public function confirmation($id,Request $request) {
        return view('client.confirmation');
    }


    public function index(Request $request) {
        $filters = [];
        if(!empty($request->payment)){
            $payment = $request->payment;
            $filters[] = ['payment',$payment];
        }
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
            $filters[] = ['name','LIKE','%'.$keyword.'%'];
        }
        $bookings = $this->bookings->loadList($filters);

        
        $this->v['bookings'] = $bookings;
        return view('admin.booking.all_bookings',$this->v);
    }

}
