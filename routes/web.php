<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClassRoomController;


use App\Http\Controllers\TeacherController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::resource('classroom', ClassRoomController::class)->except(['destroy']);
route::get('delclassroom/{id}', [ClassRoomController::class, 'destroy'])->name('classroom.del');


Route::resource('teacher', TeacherController::class);
Route::get('delteacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.del');

