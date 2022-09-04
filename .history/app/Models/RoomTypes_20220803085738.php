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
    protected $fillable = ['name','image','description','adults','children'];
    // protected $fillable = ['equipments.name as equipment','room_type_equipment.*','room_type_equipment.id as room_type_equipment_id','room_types.*'];
    // protected $table = 'room_types';
    public function equipments() {
        return $this->belongsToMany(Equipments::class,'room_type_equipment','room_type_id','equipment_id',)->withPivot('quantity_equipment');
    }

    public function loadList($params = []) {
        $query = RoomTypes::where('deleted_at',null);
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = RoomTypes::where('deleted_at',null);
        $list = $query->paginate(5);
        return $list;
    }

    public function saveNew($params) {
        // $data = array_merge($params['cols'],[
        //     'password' => Hash::make($params['cols']['password']),
        //     'role_id' => 1,
        // ]);
        $res = RoomTypes::create($params);
        return $res;
    }
   
    public function loadOne($id, $params = null) {
        $obj = RoomTypes::find($id);
        // $obj = $query->first();
        return $obj;
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
                }
            }
            $res = RoomTypes::where('id',$id)->update($dataUpdate);
            return $res;
        }
        
    }
}
