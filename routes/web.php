<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('index');
});
Route::get('/index', [StudentController::class, 'index'])->name('index');
Route::get('/student_list', [StudentController::class, 'getStudentList'])->name('student_list');
Route::get('/create', [StudentController::class, 'create'])->name('create');
Route::post('/add-new-student', [StudentController::class, 'addStudent'])->name('add-new-student');
Route::get('/edit/{id}',[StudentController::class, 'edit'])->name('edit');
Route::put('/update-student-profile/{id}',[StudentController::class, 'updateStudent'])->name('update-student-profile');
Route::get('/student_delete/{id}', [StudentController::class, 'deleteStudent'])->name('student_delete');