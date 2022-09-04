<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Session;

class Equipments extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $guarded = [];
    protected $fillable = ['name','image','description'];

    public function loadList($params = []) {
        $query = Equipments::where('deleted_at',null);
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = Equipments::where('deleted_at',null);
        $list = $query->paginate(5);
        return $list;
    }

    public function saveNew($params) {
        $res = Equipments::create($params);
        return $res;
    }
   
    public function loadOne($id, $params = null) {
        if($id == '') {
            Session::flash('error','Không xác định bản ghi cần cập nhật');
            return null;
        }else{
            $obj = Equipments::find($id);
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
            $res = Equipments::where('id',$id)->update($dataUpdate);
            return $res;
        }
    }

    public function remove($id) {
        Equipments::where('id', $id)->delete();
    }

    public function removeMany($ids) {
        Equipments::whereIn('id', $ids)->delete();
    }

}
