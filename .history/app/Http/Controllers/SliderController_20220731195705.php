<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;

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
        dd($request->all());
    }

    public function edit($id) {
        
    }

    public function update(Request $request, $id) {
        dd($request->all());
        
    }

    public function destroy($id) {
        
    }
}
