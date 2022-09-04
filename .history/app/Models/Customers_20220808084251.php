<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','address','phone','email','user_id'];

    public function Users() {
        return $this->hasOne(User::class);
    }

    public function loadList($params = []) {
        $query = Customers::where('deleted_at',null);
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = Customers::where('deleted_at',null);
        $list = $query->paginate(5);
        return $list;
    }

    public function saveNew($params) {
        $data = [];
        foreach($params as $colName => $val){
            if(in_array($colName, $this->fillable)) {
                $data[$colName] = (strlen($val) == 0) ? null : $val;
                // $data[$colName] = explode(' ', $dataUpdate[$colName]);
            }
        }
        $res = Customers::create($data);
        return $res;
    }
   
    public function loadOne($id, $params = null) {
        if($id == '') {
            Session::flash('error','Không xác định bản ghi cần cập nhật');
            return null;
        }else{
            $obj = Customers::where('deleted_at', null)->find($id);
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
            $res = Customers::where('id',$id)->update($dataUpdate);
            return $res;
        }
    }

    public function remove($id) {
        Customers::where('id', $id)->delete();
    }

    public function removeMany($ids) {
        Customers::whereIn('id', $ids)->delete();
    }
}
