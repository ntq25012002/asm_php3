<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','address','note','phone','email','user_id'];

    public function Users() {
        return $this->hasOne(User::class);
    }
}
