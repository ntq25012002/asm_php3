<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StaffController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\Auth\LoginController;

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
        Route::get('/', function () {
            return view('admin.index');
        });
        
        Route::prefix('staff')->name('staff.')->group(function () {
            Route::get('/', [StaffController::class,'index'])->name('index');
            Route::get('/add', [StaffController::class,'create'])->name('create');
            Route::post('/add', [StaffController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [StaffController::class,'edit'])->name('edit');
            Route::post('/edit/{id?}', [StaffController::class,'update'])->name('update');
            Route::get('delete/{id?}', [StaffController::class,'destroy'])->name('delete');
            Route::post('delete-staffs', [StaffController::class,'deleteStaffs'])->name('delete-staffs');
            Route::get('/search',[StaffController::class,'search'])->name('search');
        });
        // Route::prefix('service')->name('service.')->group(function() {
        //     Route::get('/', [ServiceController::class,'index'])->name('index');
        //     Route::get('/add', [ServiceController::class,'create'])->name('create');
        //     Route::post('/add', [ServiceController::class,'store'])->name('store');
        //     Route::get('/edit/{id?}', [ServiceController::class,'edit'])->name('edit');
        //     Route::post('/edit/{id?}', [ServiceController::class,'update'])->name('update');
        //     Route::get('{id?}', [ServiceController::class,'destroy'])->name('delete');
        // });

        Route::prefix('equipment')->name('equipment.')->group(function() {
            Route::get('/', [EquipmentController::class,'index'])->name('index');
            Route::get('/add', [EquipmentController::class,'create'])->name('create');
            Route::post('/add', [EquipmentController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [EquipmentController::class,'edit'])->name('edit');
            Route::post('/edit/{id?}', [EquipmentController::class,'update'])->name('update');
            Route::get('delete/{id?}', [EquipmentController::class,'destroy'])->name('delete');
            Route::get('/search',[StaffController::class,'search'])->name('search');

        });

        Route::prefix('room-type')->name('room-type.')->group(function() {
            Route::get('/', [RoomTypeController::class,'index'])->name('index');
            Route::get('/add', [RoomTypeController::class,'create'])->name('create');
            Route::post('/add', [RoomTypeController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [RoomTypeController::class,'edit'])->name('edit');
            Route::post('/edit/{id?}', [RoomTypeController::class,'update'])->name('update');
            Route::get('delete/{id?}', [RoomTypeController::class,'destroy'])->name('delete');
            Route::get('search',[StaffController::class,'search'])->name('search');
        });

        Route::prefix('room')->name('room.')->group(function () {
            Route::get('/', [RoomController::class,'index'])->name('index');
            Route::get('add', [RoomController::class,'create'])->name('create');
            Route::post('add', [RoomController::class,'store'])->name('store');
            Route::get('edit/{id?}', [RoomController::class,'edit'])->name('edit');
            Route::post('edit/{id?}', [RoomController::class,'update'])->name('update');
            Route::get('delete/{id?}', [RoomController::class,'destroy'])->name('delete');
            Route::get('/search',[RoomController::class,'search'])->name('search');

        });

        Route::prefix('slider')->name('slider.')->group(function() {
            Route::get('/', [SliderController::class,'index'])->name('index');
            Route::get('/add', [SliderController::class,'create'])->name('create');
            Route::post('/add', [SliderController::class,'store'])->name('store');
            Route::get('/edit/{id?}', [SliderController::class,'edit'])->name('edit');
            Route::post('/edit/{id?}', [SliderController::class,'update'])->name('update');
            Route::get('delete/{id?}', [SliderController::class,'destroy'])->name('delete');
            Route::get('search',[StaffController::class,'search'])->name('search');
        });

    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web','auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});