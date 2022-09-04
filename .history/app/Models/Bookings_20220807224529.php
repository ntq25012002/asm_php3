<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $fillable = ['checkin','checkout','customer_id','room_id','adults','children','payment'];

    public function rooms() {
        return $this->hasOne(Rooms::class);
    }
    public function customer() {
        return $this->hasOne(Customers::class);
    }

    public function checkCalander($id,$params) {
        $query = Bookings::whereBetween('checkin',[$params['checkin'],$params['checkout']])->where('room_id',$id)
                        ->orWhereBetween('checkout',[$params['checkin'],$params['checkout']])->where('room_id',$id)
                        ->orWhere([
                            ['checkin','<=',$params['checkin'] ],
                            ['checkout','>=',$params['checkout'] ],
                            ['room_id',$id],
                        ]);
        $res = $query->get();
        return $res;
    }
}
