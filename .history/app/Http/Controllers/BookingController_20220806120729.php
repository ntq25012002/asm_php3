<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Models\Sliders;
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
    protected $v;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
        $this->v = [];
    }

    public function checkCalendar($id,Request $request) {
        // dd($request->all());
        
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
