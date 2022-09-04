<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\RoomTypes;


class RoomController extends Controller
{
    //
    protected $rooms;
    protected $roomTypes;

    public function __construct(Rooms $rooms, RoomTypes $roomTypes ) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
    }

    public function index() {
        $rooms = $this->rooms->where('deleted_at',null)->get();
        return view('admin.room.all_rooms',[
            'rooms' => $rooms
        ]);
    }

    public function create() {
        $roomTypes = $this->roomTypes->where('deleted_at',null)->get();
        return view('admin.room.add_room',[
            'roomTypes' => $roomTypes
        ]);
    }

    public function store(Request $request) {
        dd($request->all());

    }

    public function edit($id) {
        return view('admin.room.edit_room');
    }

    public function update($id, Request $request) {
        dd($request->all());
    }
    public function destroy() {

    }
}
