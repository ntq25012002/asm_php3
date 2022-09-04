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
    protected $obj;

    public function __construct(RoomTypes $obj) {
        $this->obj = $obj;
    }
    // protected $fillable = ['equipments.name as equipment','room_type_equipment.*','room_type_equipment.id as room_type_equipment_id','room_types.*'];
    // protected $table = 'room_types';
    public function equipments() {
        return $this->belongsToMany(Equipments::class,'room_type_equipment','room_type_id','equipment_id',)->withPivot('quantity_equipment');
    }

    public function loadList($params = []) {
        $query = $this->$obj->where('deleted_at',null);
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = $this->$obj->where('deleted_at',null);
        $list = $query->paginate(5);
        return $list;
    }

    public function saveNew($params) {
        $res = $this->$obj->create($params);
        return $res;
    }
   
    public function loadOne($id, $params = null) {
        if($id == '') {
            Session::flash('error','Không xác định bản ghi cần cập nhật');
            return null;
        }else{
            $obj = $this->$obj->find($id);
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
            $res = $this->$obj->where('id',$id)->update($dataUpdate);
            return $res;
        }
    }

    public function remove($id) {
        $this->$obj->where('id', $id)->delete();
    }

    public function removeMany($ids) {
        $this->$obj->whereIn('id', $ids)->delete();
    }
}
