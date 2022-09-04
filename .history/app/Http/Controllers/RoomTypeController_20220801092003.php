<?php

namespace App\Http\Controllers;

use App\Models\RoomTypes;
use App\Models\Equipments;
use App\Models\RoomTypeEquipments;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class RoomTypeController extends Controller
{
    //
    protected $roomTypes;
    protected $equipments;
    protected $roomTypeEquipments;
    public function __construct(RoomTypes $roomTypes,Equipments $equipments,RoomTypeEquipments $roomTypeEquipments) {
        $this->roomTypes = $roomTypes;
        $this->equipments = $equipments;
        $this->roomTypeEquipments = $roomTypeEquipments;
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
        // dd($request->all());
        $dataImages = [
            'file_name' => '',
            'file_path' => '',
        ]; 
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/room-type',$fileNameHash);
            $dataImages = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath),
            ]; 
        }
        
        $data = [
            'name' => $request->name,
            'adults' => $request->adults,
            'children' => $request->children,
            'description' => $request->description,
            'image' => $dataImages['file_path']
        ];

        $roomTypeNew = $this->roomTypes->create($data);
        $roomTypeId = $roomTypeNew->id;
        $roomTypeEquipments = [];
        // dd($request->quantity_equipments);
        // dd($request->equipmentIds);

        if(!empty($request->equipmentIds) && count($request->quantity_equipments) == count($request->equipmentIds)) {
            for($i = 0; $i< count($request->equipmentIds); $i++) {
                $roomTypeEquipments[$i] = [
                    'room_type_id' => $roomTypeId,
                    'equipment_id' => $request->equipmentIds[$i],
                    'quantity_equipment' => $request->quantity_equipments[$i]
                ];
            }
        }
        // dd($roomTypeEquipments);
        $roomTypeNew->equipments()->attach($roomTypeEquipments);
        return redirect()->route('room-type.create')->with('msg','Thêm thành công');
    }

    public function edit($id) {
        // dd($id);
        $equipments = $this->equipments->where('deleted_at',null)->get();
        $roomType = $this->roomTypes->find($id);
        $roomTypeEquipment = $roomType->equipments;
        // return($roomTypeEquipment->contains(1));
        return view('admin.room-type.edit_room_type',[
            'roomType' => $roomType,
            'equipments' => $equipments,
            'roomTypeEquipment' => $roomTypeEquipment,
        ]);
    }

    public function update(Request $request,$id) {
        // dd($request->all());
        $roomTypeOld = $this->roomTypes->find($id);
        $dataImages = [
            // 'file_name' => $fileNameHash,
            'file_path' => $roomTypeOld->image,
        ]; 
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/room-type',$fileNameHash);
            $dataImages = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath),
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

        $this->roomTypes->find($id)->update($data);

        $roomTypeEquipments = [];
        // dd($request->quantity_equipments);
        // dd($request->equipmentIds);
        if(!empty($request->equipmentIds) && count($request->quantity_equipments) == count($request->equipmentIds)) {
            for($i = 0; $i< count($request->equipmentIds); $i++) {
                $roomTypeEquipments[$i] = [
                    'room_type_id' => $id,
                    'equipment_id' => $request->equipmentIds[$i],
                    'quantity_equipment' => $request->quantity_equipments[$i]
                ];
            }
        }

        $this->roomTypeEquipments->where('room_type_id', $id)->delete();
        // dd($roomTypeEquipments);
        $roomTypeOld->equipments()->attach($roomTypeEquipments);

        return redirect()->route('room-type.edit', $id)->with('msg','Sửa thành công');
    }

    public function destroy($id) {
        try {
            $this->roomTypes->where('id', $id)->delete();
            return response()->json([
                'code'=> 200,
                'message'=> 'success'
            ],200);
            // return redirect()->route('staff.index')->with('msg','Xóa thành công!');
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'code'=> 500,
                'message'=> 'fail'
            ],500);
        }
    }

    public function deleteRoomTypes(Request $request) {
        // dd($request->data);
        try {
            $ids = $request->ids;
            $this->roomTypes->whereIn('id', $ids)->delete();
            return response()->json([
                'code'=> 200,
                'message'=> 'success'
            ],200);
            // return redirect()->route('staff.index')->with('msg','Xóa thành công!');
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'code'=> 500,
                'message'=> 'fail'
            ],500);
        }
    }

}