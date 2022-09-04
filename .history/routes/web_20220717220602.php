<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StaffController;
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
            Route::post('/edit/{id}', [StaffController::class,'update'])->name('update');
            Route::get('{id?}', [StaffController::class,'destroy'])->name('delete');
            
        });
        Route::get('/search',[StaffController::class,'search'])->name('search');
    
        Route::prefix('room')->name('room.')->group(function () {
            Route::get('/', [RoomController::class,'index'])->name('index');
            Route::get('add', [RoomController::class,'create'])->name('create');
            Route::get('edit/{id?}', [RoomController::class,'edit'])->name('edit');
        });
    
    });
});
