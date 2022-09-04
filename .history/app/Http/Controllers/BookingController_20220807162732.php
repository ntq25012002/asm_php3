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
        
        if( isset($request->check_in) && isset($request->check_out)) {
            $res = $this->bookings->whereBetween('checkin',[$request->check_in,$request->check_out])->where('room_id',$id)
                                ->orWhereBetween('checkout',[$request->check_in,$request->check_out])->where('room_id',$id)
                                ->orWhere([
                                    ['checkin','<=',$request->check_in ],
                                    ['checkout','>=',$request->check_out ],
                                    ['room_id',$id],
                                ])
                                ->get();
            // dd(count($res));
            if(count($res) > 0) {
                return redirect()->route('check-calendar',['id' => $id])->with('err','Phòng đã được đặt trong khoảng thời gian này. Vui lòng chọn khoảng thời gian khác!');
            }else if((count($res) <= 0)){
                $checkin = strtotime($request->check_in);
                $checkout = strtotime($request->check_out);
                $datediff = abs($checkin - $checkout);
                $nights =1 + $datediff / (60*60*24);
                // dd($nights);
                Session::put('room_id',$id);
                Session::put('nights',$nights);
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
        // dd(Session::get('nights'));
        $roomId = Session::get('room_id');
        // $roomTypes = $this->roomTypes->loadlist();
        $room = $this->roomTypes->loadOne($roomId);
        // $this->v['roomTypes'] = $roomTypes;
        $this->v['room'] = $room;
        return view('client.booking',$this->v);
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
