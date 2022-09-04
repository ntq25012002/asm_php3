<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class Bookings extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['checkin','checkout','code','customer_id','note','room_id','guest','payment','price'];

    public function rooms() {
        return $this->belongsTo(Rooms::class,'room_id');
    }
    public function customer() {
        return $this->belongsTo(Customers::class,'customer_id');
    }

    public function checkCalendar($id,$params) {
        $query = $this->whereBetween('checkin',[$params['checkin'],$params['checkout']])->where([['room_id',$id],['deleted_at','<>',null]])
                        ->orWhereBetween('checkout',[$params['checkin'],$params['checkout']])->where([['room_id',$id],['deleted_at','<>',null]])
                        ->orWhere([
                            ['checkin','<=',$params['checkin'] ],
                            ['checkout','>=',$params['checkout'] ],
                            ['room_id',$id],
                        ]);
                        
        $res = $query->get();
        return $res;
    }
    public function search($params = []) {
        if(!empty($params['checkin']) && !empty($params['checkout'])) {
            $query = $this->whereBetween('checkin',[$params['checkin'],$params['checkout']])->where('deleted_at','<>',null)
                            ->orWhereBetween('checkout',[$params['checkin'],$params['checkout']])->where('deleted_at','<>',null)
                            // ->orWhere([
                            //     ['checkin','<=',$params['checkin'] ],
                            //     ['checkout','>=',$params['checkout'] ],
                            // ]);
            // $query = $this->where([
            //     ['checkin','LIKE','%'.$params['checkin'].'%'],
            //     ['checkout','LIKE','%'.$params['checkout'].'%']
            // ]);
        }elseif(!empty($params['checkin'])) {
            $query = $this->where('checkin','LIKE','%'.$params['checkin'].'%');
        }elseif(!empty($params['checkout'])){
            $query = $this->where('checkout','LIKE','%'.$params['checkout'].'%');
        }                
        $res = $query->get();
        return $res;
    }

    public function loadList($params = []) {
        $query = $this->where('deleted_at',null)->orderBy('created_at','desc');
        if(!empty($params)) {
            $query = $query->where($params);
        }
        $list = $query->get();
        return $list;
    }

    public function loadListWithPager($params = []) {
        $query = $this->where('deleted_at',null);
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
        $res = $this->create($data);
        return $res;
    }
   
    public function loadOne($id, $params = null) {
        if($id == '') {
            Session::flash('error','Không xác định bản ghi cần cập nhật');
            return null;
        }else{
            $obj = $this->find($id);
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
