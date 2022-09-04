<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login',['as'=>'login','uses'=>'LoginController@index']);
// Route::post('/login',['as'=>'login','uses'=>'LoginController@login']);

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('postLogin');
Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');
    
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class,'adminIndex'])->name('admin');
        
        Route::prefix('staff')->name('staff.')->group(function () {
            Route::get('/list', [StaffController::class,'index'])->name('index');
            Route::get('/add', [StaffController::class,'create'])->name('create');
            Route::post('/add', [StaffController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [StaffController::class,'edit'])->name('edit');
            Route::post('/edit/{id?}', [StaffController::class,'update'])->name('update');
            Route::get('delete/{id?}', [StaffController::class,'destroy'])->name('delete');
            Route::get('delete-staffs', [StaffController::class,'deleteStaffs'])->name('delete-staffs');
        });
        Route::prefix('customer')->name('customer.')->group(function () {
            Route::get('/list', [CustomerController::class,'index'])->name('index');
            // Route::get('/add', [CustomerController::class,'create'])->name('create');
            // Route::post('/add', [CustomerController::class,'store'])->name('store');
            // Route::get('/edit/{id?}', [CustomerController::class,'edit'])->name('edit');
            // Route::post('/edit/{id?}', [CustomerController::class,'update'])->name('update');
            Route::get('delete/{id?}', [CustomerController::class,'destroy'])->name('delete');
            Route::get('delete-customers', [CustomerController::class,'deleteCustomers'])->name('delete-customers');
        });

        Route::prefix('service')->name('service.')->group(function() {
            Route::get('/list', [ServiceController::class,'index'])->name('index');
            Route::get('/add', [ServiceController::class,'create'])->name('create');
            Route::post('/add', [ServiceController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [ServiceController::class,'edit'])->name('edit');
            Route::post('/edit/{id?}', [ServiceController::class,'update'])->name('update');
            Route::get('{id?}', [ServiceController::class,'destroy'])->name('delete');
        });

        Route::prefix('equipment')->name('equipment.')->group(function() {
            Route::get('/list', [EquipmentController::class,'index'])->name('index');
            Route::get('/add', [EquipmentController::class,'create'])->name('create');
            Route::post('/add', [EquipmentController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [EquipmentController::class,'edit'])->name('edit');
            Route::post('/edit/{id?}', [EquipmentController::class,'update'])->name('update');
            Route::get('delete/{id?}', [EquipmentController::class,'destroy'])->name('delete');
            Route::get('delete-equipments', [EquipmentController::class,'deleteEquipments'])->name('delete-equipments');
            Route::get('/search',[StaffController::class,'search'])->name('search');

        });

        Route::prefix('room-type')->name('room-type.')->group(function() {
            Route::get('/list', [RoomTypeController::class,'index'])->name('index');
            Route::get('/add', [RoomTypeController::class,'create'])->name('create');
            Route::post('/add', [RoomTypeController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [RoomTypeController::class,'edit'])->name('edit');
            Route::post('/edit/{id?}', [RoomTypeController::class,'update'])->name('update');
            Route::get('delete/{id?}', [RoomTypeController::class,'destroy'])->name('delete');
            Route::get('delete-room-types', [RoomTypeController::class,'deleteRoomTypes'])->name('delete-room-types');
        });

        Route::prefix('room')->name('room.')->group(function () {
            Route::get('/list', [RoomController::class,'index'])->name('index');
            Route::get('add', [RoomController::class,'create'])->name('create');
            Route::post('add', [RoomController::class,'store'])->name('store');
            Route::get('edit/{id?}', [RoomController::class,'edit'])->name('edit');
            Route::post('edit/{id?}', [RoomController::class,'update'])->name('update');
            Route::get('delete/{id?}', [RoomController::class,'destroy'])->name('delete');
            Route::get('delete-rooms', [RoomController::class,'deleteRooms'])->name('delete-rooms');
        });

        Route::prefix('slider')->name('slider.')->group(function() {
            Route::get('/list', [SliderController::class,'index'])->name('index');
            Route::get('/add', [SliderController::class,'create'])->name('create');
            Route::post('/add', [SliderController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [SliderController::class,'edit'])->name('edit');
            Route::post('/edit/{id?}', [SliderController::class,'update'])->name('update');
            Route::get('delete/{id?}', [SliderController::class,'destroy'])->name('delete');
            Route::get('delete-sliders', [SliderController::class,'deleteSliders'])->name('delete-sliders');
        });

        Route::prefix('booking')->name('booking.')->group(function() {
            Route::get('/list', [BookingController::class,'index'])->name('index');
            Route::get('/add', [BookingController::class,'create'])->name('create');
            Route::post('/add', [BookingController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [BookingController::class,'bookingDetail'])->name('edit');
            Route::post('/edit/{id?}', [BookingController::class,'update'])->name('update');
            Route::get('delete/{id?}', [BookingController::class,'destroy'])->name('delete');
            Route::get('delete-bookings', [BookingController::class,'deleteBookings'])->name('delete-bookings');
        });
    });
});

Route::prefix('home')->group(function() {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/room-type/{id?}', [RoomTypeController::class,'listRoomType'])->name('list-room-type');
    Route::get('/room-list',[RoomController::class,'roomList'])->name('room-list');
    Route::get('/room-detail/{id?}',[RoomController::class,'roomDetail'])->name('room-detail');
    Route::post('/room-detail/{id?}',[BookingController::class,'checkCalendar'])->name('check-calendar');
    // Route::post('/check-out',[BookingController::class,'getCheckOut'])->name('check-out');
    Route::get('/booking/{id?}',[BookingController::class,'getBooking'])->name('booking');
    Route::post('/booking/{id?}',[BookingController::class,'postBooking'])->name('postBooking');
    Route::get('/booking/{id?}/confirmation',[BookingController::class,'confirmation'])->name('confirmation');
    
});
Route::get('/momo_payment',[BookingController::class,'momoPayment']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web','auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});