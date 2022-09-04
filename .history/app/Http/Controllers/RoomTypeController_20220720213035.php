<?php

namespace App\Http\Controllers;

use App\Models\RoomTypes;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    //
    protected $roomTypes;
    public function __construct(RoomTypes $roomTypes) {
        $this->roomTypes = $roomTypes;
    }
    
    public function index() {
        $roomTypes = $this->roomTypes->where('deleted_at',null)->get();
        return view('admin.room-type.all_room_types',[
            'roomTypes' => $roomTypes
        ]);
    }

    public function create() {
        return view('admin.room-type.add_room_type');
    }

    public function store(Request $request) {
        dd($request->all());
    }

    public function edit($id) {
        $roomType = $this->roomTypes->find($id);
        return view('admin.room-type.edit_room_type',[
            'roomType' => $roomType,
        ]);
    }

    public function update(Request $request,$id) {
        dd($request->all());
    }

    public function destroy($id) {
        dd($id);
    }
}
