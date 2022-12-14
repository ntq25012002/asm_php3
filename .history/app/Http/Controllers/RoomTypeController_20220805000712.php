<?php

namespace App\Http\Controllers;

use App\Models\RoomTypes;
use App\Models\Equipments;
use App\Models\RoomTypeEquipments;
use App\Models\Rooms;
use App\Http\Requests\RoomTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class RoomTypeController extends Controller
{
    //
    protected $v;
    protected $rooms;
    protected $roomTypes;
    protected $equipments;
    protected $roomTypeEquipments;
    public function __construct(RoomTypes $roomTypes,Equipments $equipments,RoomTypeEquipments $roomTypeEquipments,Rooms $rooms) {
        $this->roomTypes = $roomTypes;
        $this->rooms = $rooms;
        $this->equipments = $equipments;
        $this->roomTypeEquipments = $roomTypeEquipments;
        $this->v = [];
    }
    
    public function index() {
        $list = $this->roomTypes->loadList();
        $this->v['roomTypes'] = $list;
        return view('admin.room-type.all_room_types',$this->v);
    }
    
    public function listRoomType($id) {
        $list = $this->rooms->loadListRoomType($id);
        $listRoomType = $this->roomTypes->loadList();

        $this->v['rooms'] = $list;
        $this->v['roomTypes'] = $listRoomType;
        return view('client.room-type-list',$this->v);
    }


    public function create() {
        $equipments = $this->equipments->where('deleted_at',null)->get();
        return view('admin.room-type.add_room_type',[
            'equipments' => $equipments
        ]);
    }

    public function store(RoomTypeRequest $request) {
        try {
            DB::beginTransaction();
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
    
            $roomTypeNew = $this->roomTypes->saveNew($data);
            $roomTypeId = $roomTypeNew->id;
    
            $roomTypeEquipments = [];
            $equipmentIds = [];
            if(!empty($request->equipmentIds) && count($request->quantity_equipments) == count($request->equipmentIds)) {
                foreach ($request->equipmentIds as $itemId) {
                    $equipmentIds[] = $itemId;
                }
                // dd($request->equipmentIds);
                // unset($equipmentIds[1]);
                // dd($equipmentIds);
                for($i = 0; $i< count($request->equipmentIds); $i++) {
                    if($request->quantity_equipments[$i] == null || $request->quantity_equipments[$i] == 0){
                        unset($equipmentIds[$i]);
                    }else{
                        $roomTypeEquipments[$i] = [
                            'room_type_id' => $roomTypeId,
                            'equipment_id' => $equipmentIds[$i],
                            'quantity_equipment' => $request->quantity_equipments[$i]
                        ];
                    }
                    
                }
            }
            // dd($roomTypeEquipments);
            $roomTypeNew->equipments()->attach($roomTypeEquipments);
            DB::commit();
            return redirect()->route('room-type.create')->with('msg','Th??m th??nh c??ng');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('room-type.create')->with('err','Th??m m???i th???t b???i');
        }
        
    }

    public function edit($id) {
        // dd($id);
        $equipments = $this->equipments->loadList();
        $roomType = $this->roomTypes->loadOne($id);
        if($roomType) {
            $roomTypeEquipment = $roomType->equipments;
            $this->v['roomType'] = $roomType;
            $this->v['equipments'] = $equipments;
            $this->v['roomTypeEquipment'] = $roomTypeEquipment;
            // return($roomTypeEquipment->contains(1));
            return view('admin.room-type.edit_room_type',$this->v);
        }else{
            return redirect()->route('room-type.index')->with('err','Kh??ng x??c ?????nh b???n ghi c???n c???p nh???t');
        }
    }

    public function update(RoomTypeRequest $request,$id) {
        try {
            // dd($request->all());
            DB::beginTransaction();
            $roomTypeOld = $this->roomTypes->loadOne($id);
            $dataImages = [
                'file_path' => $roomTypeOld->image,
            ]; 
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('public/room-type',$fileNameHash);
                $dataImages = [
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
            // dd($data);
            $this->roomTypes->saveUpdate($id,$data);

            $roomTypeEquipments = [];
            if(!empty($request->equipmentIds) && count($request->quantity_equipments) == count($request->equipmentIds)) {
                foreach ($request->equipmentIds as $itemId) {
                    $equipmentIds[] = $itemId;
                }
                // dd($request->equipmentIds);
                // unset($equipmentIds[1]);
                // dd($equipmentIds);
                for($i = 0; $i< count($request->equipmentIds); $i++) {
                    if($request->quantity_equipments[$i] == null || $request->quantity_equipments[$i] == 0){
                        unset($equipmentIds[$i]);
                    }else{
                        $roomTypeEquipments[$i] = [
                            'room_type_id' => $id,
                            'equipment_id' => $equipmentIds[$i],
                            'quantity_equipment' => $request->quantity_equipments[$i]
                        ];
                    }
                }
                // dd($roomTypeEquipments);
            }
            $this->roomTypeEquipments->remove($id);
            // dd($roomTypeEquipments);
            $roomTypeOld->equipments()->attach($roomTypeEquipments);
            DB::commit();
            return redirect()->route('room-type.edit', $id)->with('msg','S???a th??nh c??ng');
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->route('room-type.edit', $id)->with('err','S???a kh??ng th??nh c??ng');
        }
    }

    public function destroy($id) {
        try {
            $this->roomTypes->remove($id);
            return response()->json([
                'code'=> 200,
                'message'=> 'success'
            ],200);
            // return redirect()->route('staff.index')->with('msg','X??a th??nh c??ng!');
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
            $this->roomTypes->removeMany($ids);
            return response()->json([
                'code'=> 200,
                'message'=> 'success'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'code'=> 500,
                'message'=> 'fail'
            ],500);
        }
    }

}
