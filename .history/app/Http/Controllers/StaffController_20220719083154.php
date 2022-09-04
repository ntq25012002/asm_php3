<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Roles;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public $staff;
    public $roles;
    public function __construct(User $staff, Roles $roles) {
        $this->staff = $staff;
        $this->roles = $roles;
    }
    
    public function index(Request $request) {
        $roles = $this->roles->whereIn('id', [1,2,3])->get();
        $allStaffs = $this->staff->whereIn('role_id', [1,2,3])->where('deleted_at',null)->orderBy('id','desc')->get();
        return view('admin.staff.all_staffs',[
            'staffs' => $allStaffs,
            'roles' => $roles,
        ]);
    }

    public function create() {
        $roles = $this->roles->whereIn('id',[1,2,3])->get();
        return view('admin.staff.add_staff',[
            'roles' => $roles,
        ]);
    }

    public function store(StaffRequest $request) {
        
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . $file->getExtension();
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
        $this->staff->create($data);

        return redirect()->route('staff.create')->with('msg','Thêm mới thành công');
    }

    public function edit($id) {
        $staff = $this->staff->where('id',$id)->first();
        // dd($staff);
        $roles = $this->roles->get();
        return view('admin.staff.edit_staff',[
            'staff' => $staff,
            'roles' => $roles
        ]);
    }

    public function update(StaffRequest $request, $id) {
        // dd($request->all());
        $staffOld = $this->staff->where('id', $id)->first();
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . $file->getExtension();
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
        $this->staff->where('id',$id)->update($data);

        return redirect()->route('staff.edit',['id'=>$id])->with('msg','Sửa thành công');
    }

    public function destroy($id) {
        try {
            $this->staff->where('id', $id)->delete();

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

    public function search(Request $request) {
        $output = '';
        $sortBy = 'id';
        $sortType = 'desc';

        $queryStaff = $this->staff->where('name','LIKE','%' . $request->keyword . '%')
                      ->orderBy($request->sortBy ?? $sortBy,$request->sortType ?? $sortType);

        if(!empty($request->role_id)) {
            $staffs = $queryStaff->where('role_id',$request->role_id)->get();
        }else{
            $staffs = $queryStaff->get();
        }
        
        foreach($staffs as $staff) {
            $output .= '<tr class="odd gradeX">
                            <td class="center">
                                <input type="checkbox" name="staff'.$staff->id.'"> 
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
                <a href="'.route('staff.delete',['id'=>$staff->id]).'" class="btn btn-tbl-delete btn-xs">
                    <i class="fa fa-trash-o "></i>
                </a>
            </td>
        </tr>';
        }
        return response()->json($output);
    }

}
