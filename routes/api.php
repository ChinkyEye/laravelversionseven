<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Student;
use store\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/student', 'Api\StudentController@index');
Route::get('/school', 'Api\StudentController@getData');
Route::get('/teacher/{id?}', 'Api\TeacherController@index');
Route::post('/teacher/store', 'Api\TeacherController@store');
Route::put('/teacher/update', 'Api\TeacherController@update');
Route::delete('/teacher/delete/{id}', 'Api\TeacherController@destroy');
Route::get('/teacher/search/{name}', 'Api\TeacherController@search');

Route::post('login','Api\UserController@index');

Route::group(['middleware' => 'auth:sanctum'], function(){
	Route::get('/school', 'Api\StudentController@getData');
    });