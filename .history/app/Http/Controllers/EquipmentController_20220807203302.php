<?php

namespace App\Http\Controllers;
use App\Models\Equipments;
use Illuminate\Http\Request;
use App\Http\Requests\EquipmentRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    //
    protected $equipments;
    protected $v;
    public function __construct(Equipments $equipments) {
        $this->equipments = $equipments;
        $this->v = [];
    }

    public function index(Request $request) {
        // if($request->keyword == '') {
        //     $equipments = $this->equipments->where('deleted_at',null)->get();
        // }else {
        //     $equipments = $this->equipments->where('name','LIKE','%' .$request->keyword . '%')->where('deleted_at',null)->get();
        // }
        $equipments = $this->equipments->loadList();
        $this->v['equipments'] = $equipments;
        return view('admin.equipment.all_equipments',$this->v);
    }

    public function create() {
        return view('admin.equipment.add_equipment');
    }
    
    public function store(EquipmentRequest $request) {
        // dd($request->all());
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/equipment',$fileNameHash);
            $dataImage = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $dataImage['file_path'],
        ];

        $this->equipments->saveNew($data);
        return redirect()->route('equipment.create')->with('msg','Thêm mới thành công');

    }

    public function edit($id) {
        $equipment = $this->equipments->loadOne($id);
        if($equipment) {
            $this->v['equipment'] = $equipment;
            return view('admin.equipment.edit_equipment',$this->v);
        }else{
            return redirect()->route('equipment.index')->with('err','Không xác định bản ghi cập nhật!');
        }
    }

    public function update(EquipmentRequest $request, $id) {
        // dd($request->all());
        $equipmentOld = $this->equipments->loadOne($id);
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/equipment',$fileNameHash);
            $dataImage = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];
        }else{
            $dataImage= [
                'file_path' => $equipmentOld->image,
            ];
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $dataImage['file_path'],
        ];

        $this->equipments->saveUpdate($id,$data);
        return redirect()->route('equipment.edit',['id' => $id])->with('msg','Sửa thông tin thiết bị thành công');
    }

    public function destroy($id) {
        try {
            $this->equipments->remove($id);
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
    
    public function deleteEquipments(Request $request) {
        try {
            $ids = $request->ids;
            $this->equipments->removeMany($ids);
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
