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
    public function __construct(Equipments $equipments) {
        $this->equipments = $equipments;
    }

    public function index() {
        $equipments = $this->equipments->where('deleted_at',null)->get();
        return view('admin.equipment.all_equipments',[
            'equipments' => $equipments
        ]);
    }

    public function create() {
        return view('admin.equipment.add_equipment');
    }
    
    public function store(Request $request) {
        // dd($request->all());

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . $file->getExtension();
            $filePath = $file->storeAs('public/equipment',$fileNameHash);
            $dataImgae = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $dataImgae['file_path'],
        ];

        $this->equipments->create($data);
        return redirect()->route('equipment.create')->with('msg','Thêm mới thành công');

    }

    public function edit($id) {
        $equipment = $this->equipments->find($id);
        return view('admin.equipment.edit_equipment',[
            'equipment' => $equipment
        ]);
    }

    public function update(Request $request, $id) {
        // dd($request->all());
        $equipmentOld = $this->equipments->find($id);
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . $file->getExtension();
            $filePath = $file->storeAs('public/equipment',$fileNameHash);
            $dataImgae = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];
        }else{
            $dataImgae = [
                // 'file_name' => $fileNameHash,
                'file_path' => $equipmentOld->image,
            ];
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $dataImgae['file_path'],
        ];

        $this->equipments->find($id)->update($data);
        return redirect()->route('equipment.edit')->with('msg','Thêm mới thành công');
    }

    public function destroy($id) {

    }
}
