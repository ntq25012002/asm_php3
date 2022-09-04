<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Models\RoomImages;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class RoomController extends Controller
{
    //
    protected $rooms;
    protected $roomTypes;
    protected $roomImages;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes, RoomImages $roomImages) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
        $this->roomImages = $roomImages;
    }

    public function index() {
        $rooms = $this->rooms->where('deleted_at',null)->get();
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
        dd($request->all());
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
            foreach ($request->file('images') as $item) {
                $fileName = $item->getClientOriginalName();
                $filePath = $item->storeAs('public/room/detail-images',$fileName);
                $images[] = $fileName;
            }
            $roomImages = json_encode($images);
        }
        $data = [
            'name' => $request->name,
            'room_type_id' => $request->room_type_id,
            'air_condition' => $request->air_condition,
            'area' => $request->area,
            'description' => $request->content,
            'feature_image' => $dataFeatureImage['file_name'],
            'images' => $roomImages,
        ];

        $this->rooms->create($data);
        return redirect()->back()->with('msg','Thêm mới thành công');
        // $str = $request->images;
        // $arr = explode("},{",$str);
        // $convertArrayToJson = json_encode($arr);
        // $convertJsonToArray = json_decode($convertArrayToJson);
        // for ($i=0; $i < count($convertJsonToArray); $i++) { 
        //     $convertJsonToArray[$i]->storeAs('public/room',$convertJsonToArray[$i]->name);
        // }
        // dd($convertJsonToArray);

    }

    public function edit($id) {
        return view('admin.room.edit_room');
    }

    public function update($id, Request $request) {
        dd($request->all());
    }
    public function destroy($id) {
        $this->rooms->where('id', $id)->delete();
    }



}
