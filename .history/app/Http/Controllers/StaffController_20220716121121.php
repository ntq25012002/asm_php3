<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Roles;
class StaffController extends Controller
{
    public $staff;
    public $roles;
    public function __construct(User $staff, Roles $roles) {
        $this->staff = $staff;
        $this->roles = $roles;
    }
    
    public function index() {
        $allStaffs = $this->staff->whereIn('role_id',1)->get();
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

    }

    public function edit($id) {
        return view('admin.staff.edit_staff');
    }

    public function update(Request $request, $id) {

    }

}
