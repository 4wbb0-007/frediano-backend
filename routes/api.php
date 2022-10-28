<?php

use App\Http\Requests\PostActiveRequest;
use App\Http\Requests\PostDataRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/data', function (PostActiveRequest $request) {
    return DB::table('frediano_data')->insert([
        ...$request->validated(),
        "created_at" =>  \Carbon\Carbon::now(),
        "updated_at" => \Carbon\Carbon::now(),
    ]);
});

Route::post('/active', function (PostActiveRequest $request) {
    $isActive = DB::table('is_active')->first();

    if($isActive) {
        DB::table('is_active')->where('id', $isActive->id)->update(['is_active'=> $request->is_active]);
    }
    else {
        DB::table('is_active')->insert($request->validated());
    }
});


Route::get('/data', function (PostActiveRequest $request) {
    return DB::table('frediano_data')->latest()->first();
});

Route::get('/active', function (PostActiveRequest $request) {
    return DB::table('is_active')->latest()->first()?->is_active;
});
