<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function index() {
        return view('admin.staff.all_staffs');
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
