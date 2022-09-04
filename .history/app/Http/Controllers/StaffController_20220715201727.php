<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        return view('admin.user.all_staffs');
    }

    public function crete() {
        return view('admin.user.add_staff');
    }

    public function store() {

    }

    public function edit() {
        return view('admin.user.edit_staff');
    }

    public function update() {

    }

}
