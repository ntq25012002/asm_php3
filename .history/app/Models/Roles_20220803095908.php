<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $fillable = ['name','display_name'];

    public function loadListStaffs($params = []) {
        $query = Roles::where('id','<>',1);
        $list = $query->get();
        return $list;
    }
}
