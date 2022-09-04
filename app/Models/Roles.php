<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $fillable = ['name','display_name'];

    public function loadListStaff($params = []) {
        $query = $this->where('id','<>',1);
        $list = $query->get();
        return $list;
    }

    public function loadListCustomer($params = []) {
        $query = $this->where('id','<>',1);
        $list = $query->get();
        return $list;
    }
}
