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

    public function index() {

    }

    public function cart() {
        return view('client.cart');
    }

}
