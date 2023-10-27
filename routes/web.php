<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectConroller;



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




Route::get('/',[AuthController::class,'login'])->name('auth/login');
Route::post('/login',[AuthController::class,'authlogin'])->name('authlogin');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/forgot',[AuthController::class,'forgotpassword'])->name('forgot');
Route::post('/forgotmail',[AuthController::class,'ForgotPasswordMail'])->name('forgotloginPassword');

Route::group(['middleware' => 'admin'],function(){  
    Route::get('admin/dashboard',[DashController::class,'dashboard']);
    Route::get('admin/admin/list',[AdminController::class,'add_list'])->name('add_list');
    Route::get('admin/admin/add',[AdminController::class,'add_admin'])->name('add_admin');
    Route::post('admin/admin/add',[AdminController::class,'add_insert'])->name('add_insert');
    Route::get('admin/admin/edit/{id}',[AdminController::class,'edit'])->name('edit');
    Route::post('admin/admin/update/{id}',[AdminController::class,'update'])->name('update');
    Route::get('admin/admin/delete/{id}',[AdminController::class,'delete'])->name('delete');
    // class url's
    Route::get('admin/class/list',[ClassController::class,'add_list'])->name('add_list');
    Route::get('admin/class/add',[ClassController::class,'add_class'])->name('add_class');
    Route::post('admin/class/add',[ClassController::class,'add_insert'])->name('add_insert');
    Route::get('admin/class/edit/{id}',[ClassController::class,'edit'])->name('edit');
    Route::post('admin/class/update/{id}',[ClassController::class,'update'])->name('update');
    Route::get('admin/class/delete/{id}',[ClassController::class,'delete'])->name('delete');
    
    //Subjects
    Route::get('admin/subject/list',[SubjectConroller::class,'list'])->name('list');
    Route::get('admin/subject/add',[SubjectConroller::class,'add'])->name('add');
    Route::post('admin/subject/add',[SubjectConroller::class,'insert'])->name('insert');
    Route::get('admin/subject/edit/{id}',[SubjectConroller::class,'edit'])->name('edit');
    Route::post('admin/subject/update/{id}',[SubjectConroller::class,'update'])->name('update');
    Route::get('admin/subject/delete/{id}',[SubjectConroller::class,'delete'])->name('delete');

}); 

Route::group(['middleware' => 'teacher'],function(){
    Route::get('teacher/dashboard',[DashController::class,'dashboard']);
   
});
Route::group(['middleware' => 'student'],function(){
     Route::get('student/dashboard',[DashController::class,'dashboard']);
  
});
Route::group(['middleware' => 'parent'],function(){
    Route::get('parent/dashboard',[DashController::class,'dashboard']);
});

