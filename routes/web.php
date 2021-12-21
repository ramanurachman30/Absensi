<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\NotabsenController;

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
    return view('auth.login');
});

Route::get('admin-page', function() {
    return view('admin');
})->middleware('role:admin')->name('admin.page');

Route::get('user-page', function() {
    return view('home');
})->middleware('role:user')->name('user.page');

Route::get('Register', function() {
    return view('auth.register');
});

Route::get('dashboard3', function() {
    return view('dashboard3');
});

Route::get('dashboard4', function() {
    return view('dashboard4');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('absens', AbsenController::class);
Route::resource('students', StudentController::class);
Route::resource('rayons', RayonController::class);
Route::resource('rombels', RombelController::class);
Route::resource('notabsens', NotabsenController::class);
