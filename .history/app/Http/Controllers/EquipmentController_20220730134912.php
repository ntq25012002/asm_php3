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

    public function index(Request $request) {

        if($request->keyword == '') {
            $equipments = $this->equipments->where('deleted_at',null)->get();
        }else {
            $equipments = $this->equipments->where('name','LIKE','%' .$request->keyword . '%')->where('deleted_at',null)->get();
        }

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
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/equipment',$fileNameHash);
            $dataImage = [
                'file_name' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];
        }else{
            $dataImage= [
                // 'file_name' => $fileNameHash,
                'file_path' => $equipmentOld->image,
            ];
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $dataImage['file_path'],
        ];

        $this->equipments->find($id)->update($data);
        return redirect()->route('equipment.edit',['id' => $id])->with('msg','Sửa thông tin thiết bị thành công');
    }

    public function destroy($id) {
        $this->equipments->find($id)->delete();
        return redirect()->back();
    }

    public function search(Request $request) {
        $output = '';

        $equipments = $this->staff->where('name','LIKE','%' . $request->keyword . '%')->get();
       
        if(count($equipments) > 0) {
            foreach($equipments as $item) {
                $output .= ;
            }
        }elseif(count($equipments) <= 0) {
            $output =  '<tr>
                            <td class="center text-primary" colspan=9>
                                Không tìm thấy giá trị phù hợp 
                            </td>
                       </tr>';
        }
        return response()->json($output);
    }
}
