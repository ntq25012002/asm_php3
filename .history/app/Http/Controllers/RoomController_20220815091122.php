<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Models\Equipments;
use App\Models\Bookings;
use App\Http\Requests\RoomRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class RoomController extends Controller
{
    protected $rooms;
    protected $roomTypes;
    protected $equipments;
    protected $v;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes, Equipments $equipments,Bookings $bookings ) {
        $this->rooms = $rooms;
        $this->bookings = $bookings;
        $this->roomTypes = $roomTypes;
        $this->v = [];
    }

    public function index(Request $request) {
        $roomTypes = $this->roomTypes->loadList();
        $roomTyeIds = [];
        foreach($roomTypes as $item) {
            $roomTyeIds[] = $item->id;
        }

        $filters = [];
        if(!empty($request->status)){
            $status = $request->status;
            $filters[] = ['status',$status];
        }
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
            $filters[] = ['name','LIKE','%'.$keyword.'%'];
        }
        if(!empty($request->room_type)){
            $room_type_id = $request->room_type;
            $filters[] = ['room_type_id',$room_type_id];
        }
       
        if(!empty($request->price)){
            $price = explode('-',$request->price);
            if(count($price) == 1) {
                $filters[] = ['price','>=',(int)$price[0]];
            }else if(count($price) == 2) {
                $filters[] = ['price','>',(int)$price[0]];
                $filters[] = ['price','<',(int)$price[1]];
            }
        }

        $rooms1 = $this->rooms->loadList($filters);
        $rooms = [];
        foreach($rooms1 as $room) {
            if(in_array($room->room_type_id,$roomTyeIds)){
                $rooms[] = $room;
            }
        }
        
        $this->v['rooms'] = $rooms;
        $this->v['roomTypes'] = $roomTypes;
        return view('admin.room.all_rooms',$this->v);
    }

    public function roomList(Request $request) {
        $roomTypes = $this->roomTypes->loadList();
        $roomTyeIds = [];
        $filterBookings = [];
        $filters = [];
        $rooms1 = [];
        if(!empty($request->checkin)){
            $checkin = $request->checkin;
            $filterBookings[] = ['checkin','LIKE','%'.$checkin.'%'];
        }
        if(!empty($request->checkout)){
            $checkout = $request->checkout;
            $filterBookings[] = ['checkout','LIKE','%'.$checkout.'%'];
        }
        if(!empty($request->room_type)){
            $room_type_id = $request->room_type;
            $filters[] = ['room_type_id',$room_type_id];
        }
        if(!empty($request->price)){
            $price = explode('-',$request->price);
            if(count($price) == 1) {
                $filters[] = ['price','>=',(int)$price[0]];
            }else if(count($price) == 2) {
                $filters[] = ['price','>',(int)$price[0]];
                $filters[] = ['price','<',(int)$price[1]];
            }
        }
        foreach($roomTypes as $item) {
            $roomTyeIds[] = $item->id;
        }
        if(count($filterBookings) > 0 || count($filters)){
            // $ids = [];
            $roomsBookings = $this->bookings->loadList($filterBookings);
            $list = $this->rooms->where('deleted_at',null)->get();
            foreach($roomsBookings as $rb) {
                foreach($list as $item) {
                    if($item->id != $rb->room_id) {
                        $rooms1[] = $item;
                    //    unset($item);
                    }
                }
                // $ids[] = $rb->room_id;
            }
            dd($list);
            
            // $rooms1 = $this->rooms->where('deleted_at',null)->where('id','<>',$ids)->get();

            // $rooms1 = $this->rooms->loadList($filters,$ids);
        }else {
            $rooms1 = $this->rooms->loadList();
        }

        $rooms = [];
        foreach($rooms1 as $room) {
            if(in_array($room->room_type_id,$roomTyeIds)){
                $rooms[] = $room;
            }
        }
        $this->v['rooms'] = $rooms;
        $this->v['roomTypes'] = $roomTypes;
        
        return view('client.room-list',$this->v);
    }

    public function create() {
        $roomTypes = $this->roomTypes->loadList();
        $this->v['roomTypes'] = $roomTypes;
        return view('admin.room.add_room',$this->v);
    }

    public function store(RoomRequest $request) {
        try {
            // DB::beginTransaction() -> Bắt đầu thực hiện transaction (xử lý có tuần tự các thao tác trên cơ sở dữ liệu)
            DB::beginTransaction();
            $images = [];
            $dataFeatureImage = [
                'file_name' => '',
                'file_path' => '',
            ];
            if($request->hasFile('feature_image')) {
                $file = $request->file('feature_image');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('public/room/feature-image',$fileName);
                $dataFeatureImage = [
                    'file_name' => $fileName,
                    'file_path' => Storage::url($filePath),
                ];
            }
            if($request->hasFile('images')) {
                if(is_array($request->file('images')) && !empty($request->file('images')) ) {
                    foreach ($request->file('images') as $item) {
                        $fileName = $item->getClientOriginalName();
                        $filePath = $item->storeAs('public/room/detail-images',$fileName);
                        $images[] = $fileName;
                    }
                    $roomImages = json_encode($images);
                }
            }
            $data = [
                'name' => $request->name,
                'room_type_id' => $request->room_type_id,
                'air_condition' => $request->air_condition,
                'area' => $request->area,
                'phone' => $request->phone_number,
                'price' => $request->price,
                'status' => $request->status,
                'description' => $request->content,
                'feature_image' => $dataFeatureImage['file_name'],
                'images' => $roomImages,
            ];

            $this->rooms->saveNew($data);
            // commit để lưu các thay đổi
            DB::commit();
            // return redirect()->route('room.create')->with('msg','Thêm mới thành công');
            return redirect()->route('room.create')->with('msg','Thêm mới thành công');
        } catch (\Throwable $th) {
            // DB::rollBack() -> dữ liệu được khôi phục về trạng thái trước khi thực hiện transaction
            DB::rollBack();
            return redirect()->route('room.create')->with('err','Lỗi thêm mới');
            // return redirect()->back()->with('err','Lỗi thêm mới');
        }
    }

    public function edit($id) {
        $room = $this->rooms->loadOne($id);
        $roomTypes = $this->roomTypes->loadList();
        if($room) {
            $this->v['room'] = $room;
            $this->v['roomTypes'] = $roomTypes;
            return view('admin.room.edit_room',$this->v);
        }else{
            return redirect()->route('room.index')->with('err','Không xác định bản ghi cần cập nhật');
        }
    }

    public function roomDetail($id) {
        $room = $this->rooms->loadOne($id);
        $roomTypes = $this->roomTypes->loadList();
        if($room) {
            $roomTypeId = $room->room_type_id;
            $relateRooms = $this->rooms->loadListRoomType($roomTypeId,$id);
            $this->v['room'] = $room;
            $this->v['roomTypes'] = $roomTypes;
            $this->v['roomTypes'] = $roomTypes;
            $this->v['relateRooms'] = $relateRooms;
            $this->v['images']  = json_decode($room->images);
            // dd($this->v['images']);
            return view('client.room-detail',$this->v);
        }else{
            return 1 ;
            return redirect()->route('room-list')->with('err','Không xác định phòng ');
        }
    }


    public function update(RoomRequest $request, $id) {
        try {
            // DB::beginTransaction() -> Bắt đầu thực hiện transaction (xử lý có tuần tự các thao tác trên cơ sở dữ liệu)
            DB::beginTransaction();
            $roomOld = $this->rooms->loadOne($id);
            $images = [];
            $dataFeatureImage = [
                'file_name' => '',
                'file_path' => '',
            ];
            if($request->hasFile('feature_image')) {
                $file = $request->file('feature_image');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('public/room/feature-image',$fileName);
                $dataFeatureImage = [
                    'file_name' => $fileName,
                    'file_path' => Storage::url($filePath),
                ];
            }else{
                $dataFeatureImage = [
                    'file_name' => $roomOld->feature_image,
                ];
            }
            if($request->data_image != null) {
                $images = json_decode($request->data_image);
            }
            if($request->hasFile('images')) {
                if(is_array($request->file('images')) && !empty($request->file('images')) ) {
                    foreach ($request->file('images') as $item) {
                        $fileName = $item->getClientOriginalName();
                        if(!in_array($fileName,$images)) {
                            $filePath = $item->storeAs('public/room/detail-images',$fileName);
                            $images[] = $fileName;
                        }
                    }
                }
            }
            $roomImages = json_encode($images);
            // dd($roomImages);
            $dataUpdate = [
                'name' => $request->name,
                'room_type_id' => $request->room_type_id,
                'air_condition' => $request->air_condition,
                'area' => $request->area,
                'phone' => $request->phone_number,
                'price' => $request->price,
                'status' => $request->status,
                'description' => $request->content,
                'feature_image' => $dataFeatureImage['file_name'],
                'images' => $roomImages,
            ];

            $this->rooms->saveUpdate($id,$dataUpdate);
            DB::commit();
            return redirect()->route('room.edit',['id' => $id])->with('msg','Sửa thông tin phòng thành công');
            // return redirect()->back()->with('msg','Sửa thông tin phòng thành công');
        } catch (\Throwable $th) {
            // DB::rollBack() -> dữ liệu được khôi phục về trạng thái trước khi thực hiện transaction
            DB::rollBack();
            return redirect()->route('room.edit',['id' => $id])->with('err','Lỗi sửa thông tin');
            // return redirect()->back()->with('err','Lỗi sửa thông tin');
        }
    }
    public function destroy($id) {
        try {
            $this->rooms->remove($id);
            return response()->json([
                'code'=> 200,
                'message'=> 'success'
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'code'=> 500,
                'message'=> 'fail'
            ],500);
        }
    }
    
    public function deleteRooms(Request $request) {
        // dd($request->data);
        try {
            $ids = $request->ids;
            $this->rooms->removeMany($ids);
            return response()->json([
                'code'=> 200,
                'message'=> 'success'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'code'=> 500,
                'message'=> 'fail'
            ],500);
        }
    }

}
