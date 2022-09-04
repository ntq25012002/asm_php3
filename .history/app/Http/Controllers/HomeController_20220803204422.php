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
        $this->v['rooms'] = $this->rooms->loadList();
        $this->v['roomTypes'] = $this->roomTypes->loadList();
        // $this->v['rooms'] = $this->rooms->loadList();
    }
}
