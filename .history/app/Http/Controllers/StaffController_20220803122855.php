<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public $staffs;
    public $roles;
    public $v;
    public function __construct(User $staffs, Roles $roles) {
        $this->staffs = $staffs;
        $this->roles = $roles;
        $this->v = [];
    }
    
    public function index() {
        $title = 'Quản lý nhân viên';
        $roles = $this->roles->loadListStaff();
        $allStaffs = $this->staffs->loadListStaff();
        $this->v['staffs'] = $allStaffs;
        $this->v['roles'] = $roles;
        $this->v['title'] = $title;
        return view('admin.staff.all_staffs',$this->v);
    }

    public function create() {
        $roles = $this->roles->loadListStaff();
        $this->v['roles'] = $roles;
        return view('admin.staff.add_staff',$this->v);
    }

    public function store(StaffRequest $request) {
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/user',$fileNameHash);
            $dataAvatar = [
                'fileName' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];
        }else{
            $dataAvatar = [
                'fileName' => '',
                'file_path' => ''
            ];
        }
        $data = [
            'avatar' => $dataAvatar['file_path'],
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ];
        $this->staffs->saveNew($data);

        return redirect()->route('staff.create')->with('msg','Thêm mới thành công');
    }

    public function edit($id) {
        $staff = $this->staffs->loadOne($id);
        // dd($staff);
        $roles = $this->roles->get();
        if($staff) {
            $this->v['staff'] = $staff;
            $this->v['roles'] = $roles;
            return view('admin.staff.edit_staff',$this->v);
        }
    }

    public function update(StaffRequest $request, $id) {
        // dd($request->all());
        $staffOld = $this->staffs->loadOne($id);
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/user',$fileNameHash);
            $dataAvatar = [
                'fileName' => $fileNameHash,
                'file_path' => Storage::url($filePath)
            ];
        }else{
            $dataAvatar = [
                'file_path' => $staffOld->avatar
            ];
        }
        $data = [
            'avatar' => $dataAvatar['file_path'],
            'name' => $request->name,
            'email' => $request->email,
            'password' => $staffOld->password,
            'role_id' => $request->role_id ?? 4,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ];
        $this->staffs->saveUpdate($id,$data);

        return redirect()->route('staff.edit',['id'=>$id])->with('msg','Sửa thành công');
    }

    public function destroy($id) {
        try {
            $this->staffs->remove($id);
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
    
    public function deleteStaffs(Request $request) {
        // dd($request->data);
        try {
            $ids = $request->ids;
            $this->staff->removeMany($ids);
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

    public function search(Request $request) {
        $output = '';
        $sortBy = 'id';
        $sortType = 'desc';

        $queryStaff = $this->staffs->where('name','LIKE','%' . $request->keyword . '%')
                      ->orderBy($request->sortBy ?? $sortBy,$request->sortType ?? $sortType);

        if(!empty($request->role_id)) {
            $staffs = $queryStaff->where('role_id',$request->role_id)->get();
        }else{
            $staffs = $queryStaff->where('role_id','<>',1)->get();
        }
        // return response()->json($staffs);
        if(count($staffs) > 0) {
            foreach($staffs as $staff) {
                $output .= '<tr class="odd gradeX">
                                <td>
                                    <input type="checkbox" name="ids[]" value="'.$staff->id.'" >
                                </td>
                                <td class="user-circle-img sorting_1">
                                    <img src="'.asset($staff->avatar).'" alt="" width="100%">
                                </td>
                                <td class="center">'.$staff->name.'</td>
                                <td class="center">'.$staff->role->name.'</td>
                                <td class="center">
                                    <a href="tel:0' . $staff->phone_number .'">
                                         0'. $staff->phone_number .'</a>
                                </td>
                                <td class="center">
                                    <a href="mailto:'.$staff->email .'">
                                        '.$staff->email .'</a>
                                </td>
                                <td class="center">'.$staff->address .'</td>
                                <td class="center">'.$staff->created_at->format('d/m/Y ').'</td>
                                <td class="center">
                                    <a href="'.route('staff.edit', ['id' => $staff->id]) .'"
                                        class="btn btn-tbl-edit btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a  data-name = "'.$staff->name. ' " class="btn btn-tbl-delete btn-xs btn-delete" data-url="'. route('staff.delete', ['id' => $staff->id]).'">
                                        <i class="fa fa-trash-o "></i>
                                    </a>
                                    </td>
                                </tr>';
            }
        }elseif(count($staffs) <= 0) {
            $output =  '<tr>
                            <td class="center text-primary" colspan=9>
                                Không tìm thấy giá trị phù hợp 
                            </td>
                       </tr>';
        }
        return response()->json($output);
    }

}
