<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Http\Requests\RoomRequest;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class RoomController extends Controller
{
    protected $rooms;
    protected $roomTypes;
    protected $roomImages;
    protected $v;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
        $this->v = [];
    }

    public function index() {
        $roomTypes = $this->roomTypes->loadList();
        $roomTyeIds = [];
        foreach($roomTypes as $item) {
            $roomTyeIds[] = $item->id;
        }
        $rooms1 = $this->rooms->loadList();
        $rooms = [];
        foreach($rooms1 as $room) {
            if(in_array($room->room_type_id,$roomTyeIds)){
                $rooms[] = $room;
            }
        }
        return view('admin.room.all_rooms',[
            'rooms' => $rooms,
            'roomTypes' => $roomTypes,
        ]);
    }

    public function create() {
        $roomTypes = $this->roomTypes->loadList();
        return view('admin.room.add_room',[
            'roomTypes' => $roomTypes
        ]);
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
            // return redirect()->route('staff.index')->with('msg','Xóa thành công!');
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'code'=> 500,
                'message'=> 'fail'
            ],500);
        }
    }

    public function search(Request $request) {
        $output = '';

        $query = $this->staff->where('name','LIKE','%' . $request->keyword . '%')
                    ->where('deleted_at',null);
        if(!empty($request->room_type_id) && !empty($request->status)) {
            $rooms = $query->where('room_type_id',$request->room_type_id)->where('status',$request->status)->get();
        }else if(!empty($request->room_type_id) && empty($request->status)) {
            $rooms = $query->where('room_type_id',$request->room_type_id)->get();
        }else if(empty($request->room_type_id) && !empty($request->status)) {
            $rooms = $query->where('status',$request->status)->get();
        }else{
            $rooms = $query->get();
        }
        // return response()->json($staffs);
        if(count($rooms) > 0) {
            foreach($rooms as $room) {
                $output .= '<tr class="odd gradeX">
                                <td class="user-circle-img">
                                    <input type="checkbox" name="ids[]" value="'.$room->id.'" >
                                </td>
                                <td class="center">'.$room->name.'</td>
                                <td class="center">'.$room->roomType->name.'</td>
                                <td class="center">'.$room->area.'  </td>
                                <td class="center">'.$room->air_condition == 0 ? 'Không' : 'Có'.'</td>
                                <td class="center">'.$room->roomType->adults + $room->roomType->children.'</td>
                                <td class="center">'. '0'. $room->phone.'</td>
                                <td class="center">'.number_format($room->price,0,',','.').' <span style="font-size:18px">₫ </span></td>
                                <td class="center ">'.
                                    '@if ($room->status == 1)'
                                        .'<span class="btn btn-sm btn-success">Hoạt động</span>'.
                                    '@elseif ($room->status == 0 )' 
                                        .'<span class="btn btn-sm btn-default">Bảo trì</span>'.
                                    '@endif'
                                .'</td>
                                <td class="center">
                                    <a href="'.route('room.edit',['id' => $room->id]).'" class="btn btn-tbl-edit btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-tbl-delete btn-xs btn-delete" data-url="'.route('room.delete',['id' => $room->id]).'" data-name="'.$room->name.'">
                                        <i class="fa fa-trash-o "></i>
                                    </a>
                                </td>
                            </tr>';
            }
        }elseif(count($rooms) <= 0) {
            $output =  '<tr>
                            <td class="center text-primary" colspan=10>
                                Không tìm thấy giá trị phù hợp 
                            </td>
                       </tr>';
        }
        return response()->json($output);
    }

}
