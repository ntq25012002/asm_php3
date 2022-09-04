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
    protected $fillable = ['name','image','description','adults','children','equipments.name as name_equipments','room_type_equipment.quantity_equipment'];
    protected $table = 'room_types';
    // public function equipments() {
    //     return $this->belongsToMany(Equipments::class,'room_type_equipment','room_type_id','equipment_id',)->withPivot('quantity_equipment');
    // }

    public function loadList($params = []) {
        $query = DB::table($this->table)
                // ->select($this->fillable)
                ->select('room_types.*','equipments.*','equipments.name as name_equipments','room_type_equipment.quantity_equipment')
                ->join('room_type_equipment','room_type_equipment.room_type_id','=','room_types.id')
                ->join('equipments','room_type_equipment.equipment_id','=','equipments.id')
                // ->where()
                ->where('deleted_at',null);
        $list = $query->get();
        return $list;

        // $register = DB::table('registrations as R')
        //      ->select('R.address', 'R.model', 'R.chassis', 'R.delivery_date','S.track_first_status')
        //      ->join('questions as Q', 'R.registration_id', '=', 'Q.question_id')
        //      ->join('ssi_tracks as S','R.registration_id','=','S.registration_id')
        //      ->where('Q.question_schedul', '=', $dropselected)
        //      ->where('S.track_first_status', '=', 0)
        //      ->get();
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
            Session::flash('error','Không xác định bản ghi cần cập nhật');
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
