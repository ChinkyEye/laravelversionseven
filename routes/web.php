<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::resource('/student', 'Backend\StudentController');
Route::post('/student/getAllStudent', 'Backend\StudentController@getAllStudent')->name('getAllStudent');

Route::resource('/teacher', 'Backend\TeacherController');
Route::post('/teacher/getAllTeacher', 'Backend\TeacherController@getAllTeacher')->name('getAllTeacher');

Route::get('/staff/getData', 'Backend\StaffController@getData')->name('getData');
Route::resource('/staff', 'Backend\StaffController');
Route::resource('/tasks', 'Backend\TodoController');
