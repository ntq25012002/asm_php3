<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypeEquipments extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'room_type_equipment';

    public function saveDelete($id) {
        $query =  RoomTypeEquipments::where('room_type_id',$id);
        $res = $query->delete();
    }
}
