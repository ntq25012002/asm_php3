<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Sliders extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title','image','description'];

    public function loadList($params = []) {
        $query = Sliders::where('deleted_at',null);
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = Sliders::where('deleted_at',null);
        $list = $query->paginate(5);
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
        $res = Sliders::create($data);
        return $res;
    }
   
    public function loadOne($id, $params = null) {
        if($id == '') {
            Session::flash('error','Không xác định bản ghi cần cập nhật');
            return null;
        }else{
            $obj = Sliders::find($id);
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
            $res = Sliders::where('id',$id)->update($dataUpdate);
            return $res;
        }
    }

    public function remove($id) {
        Sliders::where('id', $id)->delete();
    }

    public function removeMany($ids) {
        Sliders::whereIn('id', $ids)->delete();
    }
}
