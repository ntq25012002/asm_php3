<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $fillable = ['checkin','checkout','customer_id','room_id','adults','children','payment'];

    public function rooms() {
        return $this->belongsTo(Rooms::class);
    }
    // public function customer() {
    //     return $this->belongsTo(Customers::class);
    // }
}
