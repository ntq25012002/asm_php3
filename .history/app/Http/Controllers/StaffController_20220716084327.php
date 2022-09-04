<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
class StaffController extends Controller
{
    public $staff;
    public function __construct(User $staff) {
        $this->staff = $staff;
    }
    
    public function index() {
        $allStaffs = $this->staff->where('role_id', 4)->get();
        return view('admin.staff.all_staffs',[
            'staffs' => $allStaffs,
        ]);
    }

    public function create() {
        return view('admin.staff.add_staff');
    }

    public function store() {

    }

    public function edit() {
        return view('admin.staff.edit_staff');
    }

    public function update() {

    }

}
