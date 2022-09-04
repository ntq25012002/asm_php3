<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        // dd($request->all());
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileNameHash = str::random(20) . $file->getExtension();
            $filePath = $file->storeAs('public/service',$fileNameHash);
            $dataImage = [
                'file_path' => Storage::url($fileNameHash)
            ];
        }else{
            $dataImage = [
                'file_path' => '',
            ];
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $dataImage->file_path,
        ];

        $this->services->create($data);
        return back()->with('msg','Thêm mới thành công');
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
