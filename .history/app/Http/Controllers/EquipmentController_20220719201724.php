<?php

namespace App\Http\Controllers;
use App\Models\Equipments;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    //
    protected $equipments;
    public function __construct(Equipments $equipments) {
        $this->equipments = $equipments;
    }

    public function index() {
        return view('equipment.all_equipments');
    }

    public function create() {

    }
    
    public function store(Request $request) {

    }

    public function edit($id) {

    }

    public function update(Request $request) {

    }

    public function destroy($id) {

    }
}
