<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Models\Sliders;
use App\Models\Bookings;
use App\Http\Requests\RoomRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $rooms;
    protected $roomTypes;
    protected $sliders;
    protected $bookings;
    protected $v;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes,Sliders $sliders,Bookings $bookings ) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
        $this->sliders = $sliders;
        $this->bookings = $bookings;
        $this->v = [];
    }

    public function index(Request $request) {
        $sliders = $this->sliders->loadList();
        $roomTypes = $this->roomTypes->loadList();
        $roomTyeIds = [];
        $filters = [];
        if(!empty($request->checkin)){
            $checkin = $request->checkin;
            $filters[] = ['checkin','LIKE','%'.$checkin.'%'];
        }
        if(!empty($request->checkout)){
            $checkout = $request->checkout;
            $filters[] = ['checkout','LIKE','%'.$checkout.'%'];
        }
        if(!empty($request->room_type)){
            $room_type_id = $request->room_type;
            $filters[] = ['room_type_id',$room_type_id];
        }
        if(!empty($request->price)){
            $price = explode('-',$request->price);
            if(count($price) == 1) {
                $filters[] = ['price','>=',(int)$price[0]];
            }else if(count($price) == 2) {
                $filters[] = ['price','>',(int)$price[0]];
                $filters[] = ['price','<',(int)$price[1]];
            }
        }

        foreach($roomTypes as $item) {
            $roomTyeIds[] = $item->id;
        }

        if(count($filters) == 0) {
            $rooms1 = $this->rooms->loadListWithPager();
        }elseif(count($filters) > 0){
            // $rooms1 = $this->rooms->checkCalendar($filters);
            $rooms1 = $this->bookings->whereBetween('checkin',[$filters['checkin'],$filters['checkout']])->where([['deleted_at','<>',null]])
                    ->orWhereBetween('checkout',[$filters['checkin'],$filters['checkout']])->where([['deleted_at','<>',null]])
                    ->orWhere([
                        ['checkin','<=',$filters['checkin'] ],
                        ['checkout','>=',$filters['checkout'] ],
                    ])->get();
        }
        dd($rooms1);

        $rooms = [];
        foreach($rooms1 as $room) {
            if(in_array($room->room_type_id,$roomTyeIds)){
                $rooms[] = $room;
            }
        }
        $this->v['rooms'] = $rooms;
        $this->v['roomTypes'] = $roomTypes;
        $this->v['sliders'] = $sliders;

        if(count($filters) > 0) {
            return view('client.room-list',$this->v);
        }
        return view('client.index',$this->v);
    }
}