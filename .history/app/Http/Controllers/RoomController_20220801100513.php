<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\RoomTypes;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class RoomController extends Controller
{
    protected $rooms;
    protected $roomTypes;
    protected $roomImages;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
    }

    public function index() {
        $roomTypes = $this->roomTypes->where('deleted_at',null)->get();
        $roomTyeIds = [];
        foreach($roomTypes as $item) {
            $roomTyeIds[] = $item->id;
        }
        $rooms1 = $this->rooms->where('deleted_at',null)->get();
        $rooms = [];
        foreach($rooms1 as $room) {
            if(in_array($room->room_type_id,$roomTyeIds)){
                $rooms[] = $room;
            }
        }
        return view('admin.room.all_rooms',[
            'rooms' => $rooms
        ]);
    }

    public function create() {
        $roomTypes = $this->roomTypes->where('deleted_at',null)->get();
        return view('admin.room.add_room',[
            'roomTypes' => $roomTypes
        ]);
    }

    public function store(Request $request) {
        // dd($request->images);
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

        $this->rooms->create($data);
        return redirect()->back()->with('msg','Th??m m???i th??nh c??ng');

    }

    public function edit($id) {
        $room = $this->rooms->find($id);
        $roomTypes = $this->roomTypes->where('deleted_at',null)->get();
        return view('admin.room.edit_room',[
            'room' => $room,
            'roomTypes' => $roomTypes,
        ]);
    }

    public function update($id, Request $request) {
        $roomOld = $this->rooms->find($id);

        
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
                // 'file_path' => $roomOld->feature_image,
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

        $this->rooms->where('id', $id)->update($dataUpdate);
        return redirect()->back()->with('msg','S???a th??ng tin ph??ng th??nh c??ng');

        // dd($request->all());
    }
    public function destroy($id) {
        try {
            $this->rooms->where('id', $id)->delete();
            return response()->json([
                'code'=> 200,
                'message'=> 'success'
            ],200);
            // return redirect()->route('staff.index')->with('msg','X??a th??nh c??ng!');
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
            $this->rooms->whereIn('id', $ids)->delete();
            return response()->json([
                'code'=> 200,
                'message'=> 'success'
            ],200);
            // return redirect()->route('staff.index')->with('msg','X??a th??nh c??ng!');
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'code'=> 500,
                'message'=> 'fail'
            ],500);
        }
    }


}
