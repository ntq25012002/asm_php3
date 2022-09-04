<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    protected $services;
    public function __construct(Services $services) {
        $this->services = $services;
    }

    public function index() {
        $services = $this->services->where('deleted_at',null)->get();
        return view('admin.service.all_services',[
            'services' => $services
        ]);
    }

    public function create() {

        return view('admin.service.add_service');
    }

    public function store(Request $request) {
        dd($request->all());

    }

    public function edit($id) {
        $service = $this->services->find($id);

        return view('admin.service.edit_service',[
            'service' => $service,
        ]);
    }

    public function update(Request $request) {
        dd($request->all());
    }

    public function destroy($id) {
        $this->services->find($id)->delete();
        return back();
    }
}
