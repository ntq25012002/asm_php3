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

    public function search($ids = []) {
        $query = $this->where('deleted_at',null);
        if(!empty($ids)) {
            $query = $query->whereIn('id','<>',$ids);
        }
        $list = $query->get();
        return $list;
    }

    public function loadList($params = []) {
        $query = $this->where('deleted_at',null);
        if(!empty($params)) {
            $query = $query->where($params);
        }
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = $this->where('deleted_at',null)->where('status',1);
        $list = $query->paginate(6);
        return $list;
    }

    public function loadListRoomType($id,$param=null) {
        $query = $this->where('deleted_at',null)
                    ->where('status',1)
                    ->where('id','<>',$param)
                    ->where('room_type_id',$id);
        $list = $query->get();
        return $list;
    }


    public function saveNew($params) {
        $data = [];
        foreach($params as $colName => $val){
            if(in_array($colName, $this->fillable)) {
                $data[$colName] = (strlen($val) == 0) ? null : $val;
                // $dataUpdate[$colName] = explode(' ', $dataUpdate[$colName]);
            }
        }
           
        $res = $this->create($data);
        return $res;
    }
   
    public function loadOne($id, $params = null) {
        if($id == '') {
            Session::flash('error','Không xác định bản ghi cần cập nhật');
            return null;
        }else{
            $obj = $this->where('deleted_at', null)->find($id);
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
            $res = $this->where('id',$id)->update($dataUpdate);
            return $res;
        }
    }

    public function remove($id) {
        $this->where('id', $id)->delete();
    }

    public function removeMany($ids) {
        $this->whereIn('id', $ids)->delete();
    }
}
