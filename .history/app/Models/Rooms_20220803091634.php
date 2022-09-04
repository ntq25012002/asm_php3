<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Rooms extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name','area','feature_image','images','file_images','room_type_id','phone','price','description','status','air_condition'];


    public function roomType() {
        return $this->belongsTo(RoomTypes::class);
    }

    public function loadList($params = []) {
        $query = Rooms::where('deleted_at',null);
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = Rooms::where('deleted_at',null);
        $list = $query->paginate(5);
        return $list;
    }

    public function saveNew($params) {
        $res = Rooms::create($params);
        return $res;
    }
   
    public function loadOne($id, $params = null) {
        if($id == '') {
            Session::flash('error','Không xác định bản ghi cần cập nhật');
            return null;
        }else{
            $obj = Rooms::find($id);
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
            $res = Rooms::where('id',$id)->update($dataUpdate);
            return $res;
        }
    }

    public function remove($id) {
        RoomTypes::where('id', $id)->delete();
    }

    public function removeMany($ids) {
        RoomTypes::whereIn('id', $ids)->delete();
    }
}
