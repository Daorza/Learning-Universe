<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OnlineClassController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\DetailMaterialController;
use App\Http\Controllers\RatingController;


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
/*-------------- Admin Route ----------------*/


Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/register',[AdminController::class, 'AdminRegister']) ->name('admin.register');
    Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate']) ->name('admin.register.create');
    Route::middleware(['admin'])->group(function () {
        Route::get('/users-data', [AuthenticatedSessionController::class, 'index'])->name('user.data');
    });
});

/*-------------- End Admin Route ----------------*/

Route::get('/', [OnlineClassController::class, 'index'])->name('online-class.index');

// Route::get('/admin-dashboard', function () {
//     return view('admin.dashboardadmin');
// });

Route::get('/admin-dashboard', [AdminController::class, 'showCharts'])->name('admin.dashboard');


Route::get('account', function () {
    return view('account');
})->name('acc');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('class', [OnlineClassController::class,'table'])->name('class');
Route::get('add-class', [OnlineClassController::class,'create']);
Route::post('add-class', [OnlineClassController::class,'store']);
Route::get('edit-class/{id}', [OnlineClassController::class,'edit']);
Route::put('update-class/{id}', [OnlineClassController::class,'update']);
Route::delete('delete-class/{id}', [OnlineClassController::class,'destroy']);

// class->material
Route::get('/materials/{class_id}', [MaterialController::class, 'index'])->name('materials.index');
Route::get('/materials/create/{class_id}', [MaterialController::class, 'create'])->name('materials.create');
Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');
Route::get('/materials/{id}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
Route::put('/materials/{id}', [MaterialController::class, 'update'])->name('materials.update');
Route::delete('/materials/{id}', [MaterialController::class, 'destroy'])->name('materials.destroy');

Route::get('/all-class', [OnlineClassController::class, 'global'])->name('all-class');
Route::get('/class/{id}', [OnlineClassController::class, 'show'])->name('class.show');

Route::resource('category', CategoryController::class)->except('show');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/myclass', [OnlineClassController::class, 'myclass'])->name('myclass.index');
Route::get('/myclass/{classId}', [DetailMaterialController::class, 'show'])->name('myclass.show');
Route::post('/myclass/{classId}/rate', [RatingController::class, 'store'])->name('myclass.rate');
Route::get('/myclass/{classId}/material/{materialId}/detail/{detailId}', [DetailMaterialController::class, 'showDetail'])->name('myclass.showDetail');

Route::get('/detail-material/{class_id}/{material_id}', [DetailMaterialController::class, 'index'])->name('detail-material.index');
Route::get('/detail-material/create/{class_id}/{material_id}', [DetailMaterialController::class, 'create'])->name('detail-material.create');
Route::post('/detail-material/store/{class_id}/{material_id}', [DetailMaterialController::class,'store'])->name('detail-material.store');
Route::get('/detail-material/{class_id}/{material_id}/edit/{id}', [DetailMaterialController::class, 'edit'])->name('detail-material.edit');
Route::put('/detail-material/{class_id}/{material_id}/update/{id}', [DetailMaterialController::class, 'update'])->name('detail-material.update');
Route::delete('/detail-material/{class_id}/{material_id}/{id}', [DetailMaterialController::class, 'destroy'])->name('detail-material.destroy');

Route::post('/submit-rating', [RatingController::class, 'store']);

require __DIR__.'/auth.php';
