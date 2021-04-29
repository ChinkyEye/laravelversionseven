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

Route::get('/task/getData', 'Backend\TodoController@getData')->name('TodogetData');
Route::resource('/task', 'Backend\TodoController');

Route::resource('/school', 'Backend\SchoolController');
Route::post('/school/getAllSchool', 'Backend\SchoolController@getAllSchool')->name('getAllSchool');

// vue
Route::get('/vue/get-student', 'Vue\StudentController@getStudent')->name('get_student');
Route::resource('/vue/student', 'Vue\StudentController');

Route::get('/vue/get-librarian', 'Vue\LibrarianController@getLibrarian')->name('get_librarian');
Route::resource('/vue/librarian', 'Vue\LibrarianController',['except'=>['create','update','destroy']]);

