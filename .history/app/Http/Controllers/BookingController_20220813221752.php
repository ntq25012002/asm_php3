<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Models\Bookings;
use App\Models\Customers;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    protected $rooms;
    protected $roomTypes;
    protected $bookings;
    protected $customers;
    protected $v;
    public function __construct(Rooms $rooms, RoomTypes $roomTypes,Bookings $bookings,Customers $customers) {
        $this->rooms = $rooms;
        $this->roomTypes = $roomTypes;
        $this->bookings = $bookings;
        $this->customers = $customers;
        $this->v = [];
    }
    
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momoPayment(Request $request) {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $request->total;
        $orderId = time() ."";
        $redirectUrl = "http://127.0.0.1:8000/home";
        $ipnUrl = "http://127.0.0.1:8000/home";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        // dd($signature);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        // dd($result);
        $jsonResult = json_decode($result, true);  // decode json
        // dd($jsonResult);
        //Just a example, please check more in there
        return redirect()->to($jsonResult['payUrl']);
        // header('Location: ' . $jsonResult['payUrl']);
    }

    public function checkCalendar($id,Request $request) {
        // dd($request->checkin);
        if( isset($request->checkin) && isset($request->checkout)) {
            $data = [
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
            ];
            $res = $this->bookings->checkCalendar($id,$data);
            // dd(count($res));
            if(count($res) > 0) {
                return redirect()->route('check-calendar',['id' => $id])->with('err','Phòng đã được đặt trong khoảng thời gian này. Vui lòng chọn khoảng thời gian khác!');
            }else if((count($res) <= 0)){
                // Session::forget();
                $checkin = strtotime($request->checkin);
                $checkout = strtotime($request->checkout);
                $datediff = abs($checkin - $checkout);
                $nights = 1 + $datediff / (60*60*24);
                // dd($nights);
                $roomBooking = [
                    'room_id' => $id,
                    'nights' => $nights,
                    'checkin' => $request->checkin,
                    'checkout' => $request->checkout,
                ];
                if(Session::has('roomBooking')) {
                    Session::forget('roomBooking');
                }
                    Session::put('roomBooking',$roomBooking);
                // return redirect()->route('booking',['id' => $id]);
                return response()->json([
                    'code' => 200,
                    'message' => 'success'
                ]);
            }
        }else{
            return response()->json([
                'code' => 500,
                'message' => 'error'
            ]);
            // return redirect()->route('check-calendar',['id' => $id])->with('err','Vui lòng chọn thời gian đặt phòng!');
        }
    }

    public function getBooking($id,Request $request) {
        // dd($request->checkin);
        // dd(Session::get('roomBooking'));
        // if(Session::has('roomBooking')) {
            $roomBooking = Session::get('roomBooking');
            // dd($roomBooking);
            $roomTypes = $this->roomTypes->loadlist();
            $room = $this->rooms->loadOne($id);
            if($room) {
                $roomType = $this->roomTypes->loadOne($room->room_type_id);
                $this->v['roomTypes'] = $roomTypes;
                $this->v['roomType'] = $roomType;
                $this->v['room'] = $room;
                return view('client.booking',$this->v);
            }else{
                return redirect()->route('room-list')->with('err','Không xác định phòng');
            }
        // }else{
            // return redirect()->route('room-list')->with('err','Không xác định phòng');
        // }
    }

    public function postBooking($id,BookingRequest $request) {
        // dd($request->all());
        try {
            DB::beginTransaction();
                $dataCustomer = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone,
                ];
                $res = $this->customers->saveNew($dataCustomer);
                if(!empty($res)) {
                    if(Session::has('roomBooking')) {
                        $roomBooking = Session::get('roomBooking');
                        $room = $this->rooms->loadOne($id);
                        Session::put('customer_id', $res->id);
                        $dataBooking = [
                            'code' => 'HT' . time(),
                            'room_id' => $roomBooking['room_id'],
                            'customer_id' =>$res->id,
                            'price' =>$roomBooking['nights']*$room->price,
                            'payment' => 2,
                            'checkin' =>  $roomBooking['checkin'],
                            'checkout' =>  $roomBooking['checkout'],
                            'note' =>  $request->note ?? null,
                        ];
                        $resBook = $this->bookings->saveNew($dataBooking);
                        // dd($resBook);

                        DB::commit();
                        if(!empty($resBook)) {
                            Mail::to($request->email)->send(new OrderShipped(['customer'=>$dataCustomer,'booking' => $resBook]));
                            $roomBooking = Session::put('bookingCode',$resBook->code);
                            return redirect()->route('confirmation',['id' => $id])->with('msg','Đặt phòng thành công!');
                        }else{
                            return redirect()->back()->with('err','Lỗi đặt phòng');
                        } 
                    }else{
                        return redirect()->back()->with('err','Chưa xác định thông tin phòng');
                    }
                }
            return redirect()->route('confirmation',['id' => $id]);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back();
        }
    }
    public function confirmation($id) {
        if(Session::has('roomBooking') && Session::has('customer_id') && Session::has('bookingCode')) {
            $roomBooking = Session::get('roomBooking');
            $bookingCode = Session::get('bookingCode');
            $roomBooking['code'] = $bookingCode;
            $customerId = Session::get('customer_id');
            $roomTypes = $this->roomTypes->loadlist();
            $room = $this->rooms->loadOne($roomBooking['room_id']);
            if($room) {
                $roomType = $this->roomTypes->loadOne($room->room_type_id);
                $this->v['roomTypes'] = $roomTypes;
                $this->v['roomType'] = $roomType;
                $this->v['room'] = $room;
                $this->v['customer'] = $this->customers->loadOne($customerId);
                $this->v['booking'] = $roomBooking;
                Session::forget('roomBooking');
                Session::forget('customer_id');
                Session::forget('bookingCode');

                return view('client.confirmation',$this->v);
            }else{
                return redirect()->route('room-list')->with('err','Không xác định phòng');
            }
        }else{
            return redirect()->route('room-list')->with('err','Không xác định phòng');
        }
    }

    public function index(Request $request) {
        $filters = [];
        if(!empty($request->payment)){
            $payment = $request->payment;
            $filters[] = ['payment',$payment];
        }
        if(!empty($request->code)){
            $code = $request->code;
            $filters[] = ['code','LIKE','%'.$code.'%'];
        }
        if(!empty($request->checkin)){
            $checkin = $request->checkin;
            $filters[] = ['checkin','LIKE','%'.$checkin.'%'];
        }
        if(!empty($request->checkout)){
            $checkout = $request->checkout;
            $filters[] = ['checkout','LIKE','%'.$checkout.'%'];
        }
        $bookings = $this->bookings->loadList($filters);
        $this->v['bookings'] = $bookings;
        return view('admin.booking.all_bookings',$this->v);
    }

    public function bookingDetail($id) {
        $booking = $this->bookings->loadOne($id);
        if($booking) {
            $this->v['booking'] = $booking;
            return view('admin.booking.edit_booking',$this->v);
        }else{
            return redirect()->route('booking.index')->with('err','Không xác định đơn đặt phòng');
        }
    }

    public function update($id,Request $request) {
        $data = [
            'payment' => $request->payment
        ];
        $res = $this->bookings->saveUpdate($id,$data);
        if($res) {
            return redirect()->route('booking.edit',['id' => $id])->with('msg','Cập nhật thông tin đơn đặt phòng thành công!');
        }else{
            return redirect()->route('booking.edit',['id' => $id])->with('err','Lỗi cập nhật!');
        }
    }

    public function destroy($id) {
        try {
            $this->bookings->remove($id);
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
    
    public function deleteBookings(Request $request) {
        // dd($request->data);
        try {
            $ids = $request->ids;
            $this->bookings->removeMany($ids);
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
