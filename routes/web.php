<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersCon;
use App\Http\Controllers\jenispemeriksaanCon;
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

//users
Route::get('/users', [UsersCon::class, 'index']);
Route::post('/AddUser', [UsersCon::class, 'AddUser']);
Route::post('/getUser/{id}', [UsersCon::class, 'getUser']);
Route::post('/EditUser', [UsersCon::class, 'editUser']);
Route::post('/delUser/{id}', [UsersCon::class, 'delete']);
Route::post('pageusers/{id}', [UsersCon::class, 'pageUsers']);
Route::post('searchusers/{search?}', [UsersCon::class, 'searchusers']);
// Route::get('pegeusers/{id}', [UsersCon::class, 'pageUsers']);

Route::post('test', function (Request $request) {
    dd($request);
});



//Data Pem
Route::get("jenispemeriksaan", [jenispemeriksaanCon::class, "index"]);
Route::post('AddJp', [jenispemeriksaanCon::class, 'AddJp']);
Route::post('editJp/{id}', [jenispemeriksaanCon::class, 'editJp']);
Route::post('UpdateJp', [jenispemeriksaanCon::class, 'UpdateJp']);
Route::post('delJp/{id}', [jenispemeriksaanCon::class, 'delete']);
Route::post('pagejps/{id}', [jenispemeriksaanCon::class, 'pageJps']);
Route::post('searchjps/{search?}', [jenispemeriksaanCon::class, 'searchJps']);
