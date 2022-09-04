<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipments extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $guarded = [];
    protected $fillable = ['name','image','description'];

    public function loadList($params = []) {
        $query = Equipments::where('deleted_at',null);
        $list = $query->get();
        return $list;
    }

}
