<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Http\Requests\RoomRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $rooms;
    protected $roomTypes;
    // protected $roomImages;
    protected $v;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
        $this->v = [];
    }

    public function index() {
        $roomTypes = $this->roomTypes->loadList();
        $roomTyeIds = [];
        foreach($roomTypes as $item) {
            $roomTyeIds[] = $item->id;
        }
        $rooms1 = $this->rooms->loadListLimit(2);
        dd($rooms1);
        $rooms = [];
        foreach($rooms1 as $room) {
            if(in_array($room->room_type_id,$roomTyeIds)){
                $rooms[] = $room;
            }
        }
        $this->v['rooms'] = $rooms;
        $this->v['roomTypes'] = $roomTypes;
        return view('client.index',$this->v);
    }
}
