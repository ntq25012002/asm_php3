<?php

namespace App\Http\Controllers;

use App\Models\RoomTypes;
use App\Models\Equipments;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class RoomTypeController extends Controller
{
    //
    protected $roomTypes;
    protected $equipments;
    public function __construct(RoomTypes $roomTypes,Equipments $equipments) {
        $this->roomTypes = $roomTypes;
        $this->equipments = $equipments;
    }
    
    public function index() {
        $roomTypes = $this->roomTypes->where('deleted_at',null)->get();
        return view('admin.room-type.all_room_types',[
            'roomTypes' => $roomTypes
        ]);
    }

    public function create() {
        $equipments = $this->equipments->where('deleted_at',null)->get();
        return view('admin.room-type.add_room_type',[
            'equipments' => $equipments
        ]);
    }

    public function store(Request $request) {
        dd($request->all());
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/room-type',$fileNameHash);
            $dataImages = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($fileNameHash),
            ]; 
        }

        $data = [
            'name' => $request->name,
            'adults' => $request->adults,
            'children' => $request->children,
            'equipment_id' => $request->equipment_id,
            'quantity_equipment' => $request->quantity_equipment,
            'description' => $request->description,
            'image' => $dataImages['file_path']
        ];

        $this->roomTypes->create($data);
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
