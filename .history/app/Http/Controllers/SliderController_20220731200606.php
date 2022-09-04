<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //
    protected $sliders;
    public function __construct(Sliders $silders) {
        $this->sliders = $silders;
    }

    public function index() {
        $silders = $this->silders->where('deleted_at',null);
        return view('admin.slider.all_silders',[
            'silders' => $silders
        ]);
    }

    public function create() {
        return view('admin.slider.add_slider');
    }

    public function store(Request $request) {
        // dd($request->all());
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/silder',$fileName);
            $dataImage = [
                'file_name' => $fileName,
                'file_path' => Storage::url($filePath)
            ];
        }
        $data = [
            'title' => $request->title,
            'image' => $dataImage['file_path'],
            'description' => $request->description,
        ];

        $this->sliders->create($data);
        return redirect()->back()->with('msg','Thêm mới thành công!');
    }

    public function edit($id) {
        
    }

    public function update(Request $request, $id) {
        dd($request->all());
        
    }

    public function destroy($id) {
        
    }
}
