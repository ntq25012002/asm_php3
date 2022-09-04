<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Models\Bookings;
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
    protected $v;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes,Bookings $bookings) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
        $this->bookings = $bookings;
        $this->v = [];
    }

    public function checkCalendar($id,Request $request) {
        // dd($request->all());

        if( isset($request->checkin) && isset($request->checkout)) {
            $data = [
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
            ];
            $res = $this->bookings->checkCalander($id,$data);
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
                
                return redirect()->route('booking');
            }
        }else{
            return redirect()->route('check-calendar',['id' => $id])->with('err','Vui lòng chọn thời gian đặt phòng!');
        }
    }

    public function getCheckOut(Request $request) {
        dd($request->all());
        $this->v['data'] = $request->all();
        return view('client.check_out',);
    }

    public function getBooking(Request $request) {
        // dd($request->all());
        // dd(Session::get('roomBooking'));
        if(Session::has('roomBooking')) {
            
            $roomBooking = Session::get('roomBooking');
            // dd($roomBooking);
            $dCheckin=strtotime($roomBooking['checkin']);
            $dCheckout=strtotime($roomBooking['checkout']);

            $datediffCheckin = localtime($dCheckin,true);
            $datediffCheckout = localtime($dCheckout,true);
            // dd($datediffCheckin,$datediffCheckout);
            {{$checkin['tm_wday'] == 0? 'Chủ nhật':'Thứ '.$checkin['tm_wday']+1}}
            $roomTypes = $this->roomTypes->loadlist();
            $room = $this->rooms->loadOne($roomBooking['room_id']);
            $roomType = $this->roomTypes->loadOne($room->room_type_id);

            $this->v['roomTypes'] = $roomTypes;
            $this->v['roomType'] = $roomType;
            $this->v['room'] = $room;
            $this->v['roomBooking'] = $roomBooking;
            $this->v['checkinD'] = $datediffCheckin['tm_wday'] == 0? 'Chủ nhật':'Thứ '.$checkin['tm_wday']+1;
            $this->v['checkinD'] = $datediffCheckout['tm_wday'] == 0? 'Chủ nhật':'Thứ '.$checkin['tm_wday']+1;
            $this->v['checkinMY'] = $datediffCheckin['tm_mon']+1 .'/'. $datediffCheckin['tm_year'] + 1900;
            $this->v['checkoutMY'] = $datediffCheckout['tm_mon']+1 .'/'. $datediffCheckout['tm_year'] + 1900;
    
            return view('client.booking',$this->v);
        }
    }


    public function cart() {
        $roomTypes = $this->roomTypes->loadList();
        $roomTyeIds = [];
        foreach($roomTypes as $item) {
            $roomTyeIds[] = $item->id;
        }
        $rooms1 = $this->rooms->loadListLimit(6);
        $rooms = [];
        foreach($rooms1 as $room) {
            if(in_array($room->room_type_id,$roomTyeIds)){
                $rooms[] = $room;
            }
        }
        $this->v['rooms'] = $rooms;
        $this->v['roomTypes'] = $roomTypes;
        return view('client.cart',$this->v);
    }

}
