<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Customers;
use App\Models\Roles;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public $customers;
    public $roles;
    public $v;
    public function __construct(Customers $customers, Roles $roles) {
        $this->customers = $customers;
        $this->roles = $roles;
        $this->v = [];
    }
    
    public function index(Request $request) {
        $title = 'Quản lý khách hàng';
        $roles = $this->roles->loadListStaff();
        $filters = [];
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
            $filters[] = ['name','LIKE','%'.$keyword.'%'];
        }
        if(!empty($request->role_id)){
            $role_id = $request->role_id;
            $filters[] = ['role_id',$role_id];
        }
        $allCustomers = $this->customers->loadListStaff($filters);
        $this->v['customers'] = $allCustomers;
        $this->v['roles'] = $roles;
        $this->v['title'] = $title;
        return view('admin.customer.all_customers',$this->v);
    }

    public function create() {
        $roles = $this->roles->loadListStaff();
        $this->v['roles'] = $roles;
        return view('admin.staff.add_staff',$this->v);
    }

    // public function store(StaffRequest $request) {
    //     if($request->hasFile('avatar')) {
    //         $file = $request->file('avatar');
    //         // $fileName = $file->getClientOriginalName();
    //         $fileNameHash = time() . '_' . $file->getClientOriginalName();
    //         $filePath = $file->storeAs('public/user',$fileNameHash);
    //         $dataAvatar = [
    //             'fileName' => $fileNameHash,
    //             'file_path' => Storage::url($filePath)
    //         ];
    //     }else{
    //         $dataAvatar = [
    //             'fileName' => '',
    //             'file_path' => ''
    //         ];
    //     }
    //     $data = [
    //         'avatar' => $dataAvatar['file_path'],
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role_id' => $request->role_id,
    //         'address' => $request->address,
    //         'phone_number' => $request->phone_number,
    //     ];
    //     // dd($data);
    //     $this->staffs->saveNew($data);

    //     return redirect()->route('staff.create')->with('msg','Thêm mới thành công');
    // }

    public function edit($id) {
        $customer = $this->customers->loadOne($id);
        // dd($staff);
        $roles = $this->roles->loadListStaff();
        if($customer) {
            $this->v['customer'] = $customer;
            $this->v['roles'] = $roles;
            return view('admin.staff.edit_staff',$this->v);
        }else{
            return redirect()->route('staff.index')->with('err','Không xác định bản ghi cần cập nhật');
        }
    }

    // public function update(Request $request, $id) {
    //     // dd($request->all());
    //     $staffOld = $this->staffs->loadOne($id);
    //     if($request->hasFile('avatar')) {
    //         $file = $request->file('avatar');
    //         $fileName = $file->getClientOriginalName();
    //         $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
    //         $filePath = $file->storeAs('public/user',$fileNameHash);
    //         $dataAvatar = [
    //             'fileName' => $fileNameHash,
    //             'file_path' => Storage::url($filePath)
    //         ];
    //     }else{
    //         $dataAvatar = [
    //             'file_path' => $staffOld->avatar
    //         ];
    //     }
    //     $data = [
    //         'avatar' => $dataAvatar['file_path'],
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $staffOld->password,
    //         'role_id' => $request->role_id ?? 4,
    //         'address' => $request->address,
    //         'phone_number' => $request->phone_number,
    //     ];
    //     // dd($data);
    //     $res = $this->staffs->saveUpdate($id,$data);
    //     if($res) {
    //         return redirect()->route('staff.edit',['id'=>$id])->with('msg','Sửa thành công');
    //     }else{
    //         return redirect()->route('staff.edit',['id'=>$id])->with('err','Sửa thất bại');
    //     }
    // }

    public function destroy($id) {
        try {
            $this->staffs->remove($id);
            return response()->json([
                'code'=> 200,
                'message'=> 'success'
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'code'=> 500,
                'message'=> 'fail'
            ],500);
        }
    }
    
    public function deleteCustomers(Request $request) {
        // dd($request->data);
        try {
            $ids = $request->ids;
            $this->staffs->removeMany($ids);
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
