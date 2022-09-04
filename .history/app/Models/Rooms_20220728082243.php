<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $fillable = ['name','area','feature_image','images','room_type_id','price','description','status'];


    public function roomType() {
        return $this->belongsTo(RoomTypes::class);
    }
}
