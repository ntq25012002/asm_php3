<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomTypes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','image','description','adults','children'];

    public function equipments() {
        return $this->belongsToMany(Equipments::class,'room_type_equipment','room_type_id','equipment_id')->withPivot('quantity_equipment');
    }
}
