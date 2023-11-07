<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OnlineClassController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\studentController;

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

Route::get('/logout', function () {
    return view('welcome');
});

Route::get('/dashboard', [OnlineClassController::class, 'index']);
// Route::get('/online-class-carousel', [OnlineClassController::class, 'index']);

Route::get('/admin-dashboard', function () {
    return view('dashboardadmin');
});

Route::get('class', [OnlineClassController::class,'table'])->name('class');
Route::get('add-class', [OnlineClassController::class,'create']);
Route::post('add-class', [OnlineClassController::class,'store']);
Route::get('edit-class/{id}', [OnlineClassController::class,'edit']);
Route::put('update-class/{id}', [OnlineClassController::class,'update']);
Route::delete('delete-class/{id}', [OnlineClassController::class,'destroy']);

Route::get('students', [StudentController::class, 'index']);
Route::get('add-student', [StudentController::class, 'create']);
Route::post('add-student', [StudentController::class, 'store']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);

Route::resource('category', CategoryController::class)->except('show');
