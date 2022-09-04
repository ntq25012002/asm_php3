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
        $sliders = $this->sliders->where('deleted_at',null)->get();
        // dd($sliders);
        return view('admin.slider.all_sliders',[
            'sliders' => $sliders
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
        $slider = $this->sliders->where('deleted_at', null)->find($id);
        return view('admin.slider.edit_slider',[
            'slider' => $slider
        ]);
    }

    public function update(Request $request, $id) {
        $sliderOld = $this->sliders->find($id);
       if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/silder',$fileName);
            $dataImage = [
                'file_name' => $fileName,
                'file_path' => Storage::url($filePath)
            ];
        }else{
            $dataImage = [
                'file_path' => $sliderOld->image
            ];
        }
        $dataUpdate = [
            'title' => $request->title,
            'image' => $dataImage['file_path'],
            'description' => $request->description,
        ];

        $this->sliders->where('id',$id)->update($dataUpdate);
        return redirect()->back()->with('msg','Cập nhật mới thành công!');
    }

    public function destroy($id) {
        try {
            $this->sliders->where('id', $id)->delete();
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

    public function deleteSliders(Request $request) {
        // dd($request->data);
        try {
            $ids = $request->ids;
            $this->sliders->whereIn('id', $ids)->delete();
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
}
