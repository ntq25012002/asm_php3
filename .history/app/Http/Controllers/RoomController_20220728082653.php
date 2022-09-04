<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;


class RoomController extends Controller
{
    //
    protected $rooms;
    protected $roomType;

    public function __construct(Rooms $rooms) {
        $this->rooms = $rooms;
    }

    public function index() {
        $rooms = $this->rooms->where('deleted_at',null)->get();
        return view('admin.room.all_rooms',[
            'rooms' => $rooms
        ]);
    }

    public function create() {
        return view('admin.room.add_room');
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
