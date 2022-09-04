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
        $str = $request->images;
        $arr = explode(",",$str);
        // $convertArrayToJson = json_encode($request->images);
        $convertJsonToArray = json_decode($arr);
        dd($convertJsonToArray);

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



    public function fileCreate()
    {
        return view('imageupload');
    }
    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        

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
