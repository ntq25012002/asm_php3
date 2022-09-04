<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Models\Bookings;
use App\Http\Requests\RoomRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
        // dd($id)
        // dd($request->all());
        if( isset($request->check_in) && isset($request->check_out)) {
            $res = $this->bookings->where('room_id',$id)
                        ->whereBetween('checkin',[$request->check_in,$request->check_out])
                        ->orWhereBetween('checkout',[$request->check_in,$request->check_out])
                        ->orWhere([
                            ['checkin','<=',$request->check_in ],
                            ['checkout','>=',$request->check_out ],
                            // ['room_id',$id],
                        ]);
            dd($res);
        }else{
            return redirect()->route('check-calendar',['id' => $id]);
        }
    }

    public function getCheckOut(Request $request) {
        dd($request->all());
        $this->v['data'] = $request->all();
        return view('client.check_out',);
    }

    public function booking(Request $request) {
        dd($request->all());
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
