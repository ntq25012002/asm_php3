<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Roles;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public $staff;
    public $roles;
    public function __construct(User $staff, Roles $roles) {
        $this->staff = $staff;
        $this->roles = $roles;
    }
    
    public function index() {
        $allStaffs = $this->staff->whereIn('role_id', [1,2,3])->get();
        return view('admin.staff.all_staffs',[
            'staffs' => $allStaffs,
        ]);
    }

    public function create() {
        $roles = $this->roles->get();
        return view('admin.staff.add_staff',[
            'roles' => $roles,
        ]);
    }

    public function store(Request $request) {
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
            'name' => $request->first_name. ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id ?? 4,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ];
        $this->staff->create($data);

        return redirect()->route('staff.add')->with('msg','Thêm mới thành công');
    }

    public function edit($id) {
        return view('admin.staff.edit_staff');
    }

    public function update(Request $request, $id) {

    }

    public function destroy($id) {
        $this->staff->where('id', $id)->delete();
        return redirect()->route('staff.index')->with('msg','Xóa thành công!');
    }
    public function searchName(Request $request) {
        $output = '';
        $staffs = $this->staff->where('name','LIKE','%' . $request->keyword . '%')->get();

        foreach($staffs as $staff) {
            $output .= '<tr class="odd gradeX">
                            <td class="user-circle-img sorting_1">
                                <img src="'.asset($staff->avatar).'" alt="">
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

        return response()->json($output );
    }

}
