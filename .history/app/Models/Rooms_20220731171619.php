<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rooms extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name','area','feature_image','images','file_images','room_type_id','phone','price','description','status','air_condition'];


    public function roomType() {
        return $this->belongsTo(RoomTypes::class);
    }
}
