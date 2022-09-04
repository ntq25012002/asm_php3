<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StaffRequest;

class SliderController extends Controller
{
    //
    protected $sliders;
    protected $v;
    public function __construct(Sliders $silders) {
        $this->sliders = $silders;
        $this->v = [];
    }

    public function index() {
        $sliders = $this->sliders->loadList();
        // dd($sliders);
        $this->v['sliders'] = $sliders;
        return view('admin.slider.all_sliders',$this->v);
    }

    public function create() {
        return view('admin.slider.add_slider');
    }

    public function store(SliderRequest $request) {
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

        $res = $this->sliders->saveNew($data);
        if($res) {
            return redirect()->back()->with('msg','Thêm mới thành công!');
        }else{
            return redirect()->back()->with('err','Thêm mới thất bại!');
        }
    }

    public function edit($id) {
        $slider = $this->sliders->loadOne($id);
        $this->v['slider'] = $slider;
        if($slider) {
            return view('admin.slider.edit_slider',$this->v);
        }else{
            return redirect()->route('slider.index');
        }
    }

    public function update(SliderRequest $request, $id) {
        $sliderOld = $this->sliders->loadOne($id);
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

        $res = $this->sliders->where('id',$id)->update($dataUpdate);
        if($res) {
            return redirect()->back()->with('msg','Cập nhật thành công!');
        }else{
            return redirect()->back()->with('err','Cập nhật thất bại!');
        }
    }

    public function destroy($id) {
        try {
            $this->sliders->remove($id);
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

    public function deleteSliders(Request $request) {
        // dd($request->data);
        try {
            $ids = $request->ids;
            $this->sliders->removeMany($ids);
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
