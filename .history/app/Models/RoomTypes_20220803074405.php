<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class RoomTypes extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $fillable = ['name','image','description','adults','children'];
    protected $fillable = ['equipments.name as equipment','room_type_equipment.*','room_type_equipment.id as room_type_equipment_id','room_types.*'];
    protected $table = 'room_types';
    // public function equipments() {
    //     return $this->belongsToMany(Equipments::class,'room_type_equipment','room_type_id','equipment_id',)->withPivot('quantity_equipment');
    // }

    public function loadList($params = []) {
        $query =  DB::table($this->table)
                ->select($this->fillable)
                ->leftJoin('room_type_equipment','room_type_equipment.room_type_id','=','room_types.id')
                ->rightJoin('equipments','room_type_equipment.equipment_id','=','equipments.id')
                ->where('room_types.deleted_at',null)
                ->where('equipments.deleted_at',null);
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = DB::table($this->table)
                ->select($this->fillable);
        $list = $query->paginate(5);
        return $list;
    }

    public function saveNew($params) {
        $data = array_merge($params['cols'],[
            'password' => Hash::make($params['cols']['password']),
            'role_id' => 1,
        ]);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }

    public function loadOne($id, $params = null) {
        $query = DB::table($this->table)->where('id','=',$id);
        $obj = $query->first();
        return $obj;
    }

    public function saveUpdate($params) {
        if($params['cols']['id'] == '') {
            Session::flash('error','Kh??ng x??c ?????nh b???n ghi c???n c???p nh???t');
            return null;
        }else{
            $dataUpdate = [];
            foreach($params['cols'] as $colName => $val){
                if($colName == 'id') continue;
                if(in_array($colName, $this->fillable)) {
                    $dataUpdate[$colName] = (strlen($val) == 0) ? null : $val;
                }
            }
            $res = DB::table($this->table)->where('id',$params['cols']['id'])->update($dataUpdate);
            return $res;
        }
        
    }
}
