<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use SoftDeletes;
    // protected $guarded = []; 
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role() {
        return $this->belongsTo(Roles::class,'role_id');
    }

    public function loadListStaff($params = []) {
        $query = User::where('role_id','<>',1)->where('deleted_at',null)
        ->orderBy('id','desc')
        ->get();
        $list = $query->get();
        return $list;
    }
    public function loadListCustomer($params = []) {
        $query = User::where('role_id',1)->where('deleted_at',null);
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = User::where('deleted_at',null);
        $list = $query->paginate(5);
        return $list;
    }

    public function saveNew($params) {
        $res = User::create($params);
        return $res;
    }
   
    public function loadOne($id, $params = null) {
        if($id == '') {
            Session::flash('error','Không xác định bản ghi cần cập nhật');
            return null;
        }else{
            $obj = User::find($id);
            // $obj = $query->first();
            return $obj;
        }
    }
    public function saveUpdate($id,$params) {
        if($id == '') {
            Session::flash('error','Không xác định bản ghi cần cập nhật');
            return null;
        }else{
            $dataUpdate = [];
            foreach($params as $colName => $val){
                if(in_array($colName, $this->fillable)) {
                    $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
                    // $dataUpdate[$colName] = explode(' ', $dataUpdate[$colName]);
                }
            }
            $res = User::where('id',$id)->update($dataUpdate);
            return $res;
        }
    }

    public function remove($id) {
        User::where('id', $id)->delete();
    }

    public function removeMany($ids) {
        User::whereIn('id', $ids)->delete();
    }
}
