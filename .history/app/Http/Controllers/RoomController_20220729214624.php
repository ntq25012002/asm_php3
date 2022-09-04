<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\RoomImages;
use App\Models\RoomTypes;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class RoomController extends Controller
{
    //
    protected $rooms;
    protected $roomTypes;
    protected $roomImages;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes, RoomImages $roomImages ) {
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
        $str = $request->images;
        $arr = explode(",",$str);
        $convertJson = json_encode($arr);
        dd($convertJson);


    }

    public function edit($id) {
        return view('admin.room.edit_room');
    }

    public function update($id, Request $request) {
        dd($request->all());
    }
    public function destroy() {

    }

    // public function fileCreate()
    // {
    //     return view('imageupload');
    // }

    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $imagePath = Storage::url($imageName);
        $image->move(public_path('images'),$imageName);
        
        // $imageUpload = new ImageUpload();
        $this->roomImages->filename = $imageName;
        $this->roomImages->save();
        return response()->json(['success'=>$imageName]);
    }
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        $this->roomImages->where('filename',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }
}
