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
                $fileList = $request->file_list;
            }
        }else{
            $fileList = '';
        }
        $data = [
            'name' => $request->name,
            'room_type_id' => $request->room_type_id,
            'air_condition' => $request->air_condition,
            'area' => $request->area,
            'phone' => $request->phone_number,
            'price' => $request->price,
            'status' => 1,
            'description' => $request->content,
            'feature_image' => $dataFeatureImage['file_name'],
            'images' => $roomImages,
            'file_images' => $fileList,
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
        dd($request->all());
    }
    public function destroy($id) {
        $this->rooms->where('id', $id)->delete();
        return back();
    }


}
