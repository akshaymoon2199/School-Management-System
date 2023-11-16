<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassSubjectConroller;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectConroller;
use App\Http\Controllers\UserController;



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
    Route::get('admin/admin/list',[AdminController::class,'add_list'])->name('admin.add_list');
    Route::get('admin/admin/add',[AdminController::class,'add_admin'])->name('admin.add_admin');
    Route::post('admin/admin/add',[AdminController::class,'add_insert'])->name('admin.add_insert');
    Route::get('admin/admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('admin/admin/update/{id}',[AdminController::class,'update'])->name('admin.update');
    Route::get('admin/admin/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');
    
    // class 
    Route::get('admin/class/list',[ClassController::class,'add_list'])->name('add_list');
    Route::get('admin/class/add',[ClassController::class,'add_class'])->name('add_class');
    Route::post('admin/class/add',[ClassController::class,'add_insert'])->name('add_insert');
    Route::get('admin/class/edit/{id}',[ClassController::class,'edit'])->name('edit');
    Route::post('admin/class/update/{id}',[ClassController::class,'update'])->name('update');
    Route::get('admin/class/delete/{id}',[ClassController::class,'delete'])->name('delete');
    
    //Subjects
    Route::get('admin/subject/list',[SubjectConroller::class,'list'])->name('subject.list');
    Route::get('admin/subject/add',[SubjectConroller::class,'add'])->name('add');
    Route::post('admin/subject/add',[SubjectConroller::class,'insert'])->name('subject.insert');
    Route::get('admin/subject/edit/{id}',[SubjectConroller::class,'edit'])->name('edit');
    Route::post('admin/subject/update/{id}',[SubjectConroller::class,'update'])->name('update');
    Route::get('admin/subject/delete/{id}',[SubjectConroller::class,'delete'])->name('delete');

    //Assign Subject 
    Route::get('admin/assign_subject/list',[ClassSubjectConroller::class,'list'])->name('assign_subject.list');
    Route::get('admin/assign_subject/add',[ClassSubjectConroller::class,'add'])->name('add');
    Route::post('admin/assign_subject/add',[ClassSubjectConroller::class,'insert'])->name('assign_subject.insert');
    Route::get('admin/assign_subject/edit/{id}',[ClassSubjectConroller::class,'edit'])->name('assign_subject.edit');
    Route::post('admin/assign_subject/update/{id}',[ClassSubjectConroller::class,'update'])->name('assign_subject.update');
    Route::get('admin/assign_subject/delete/{id}',[ClassSubjectConroller::class,'delete'])->name('assign_subject.delete');
    Route::get('admin/assign_subject/single_edit/{id}',[ClassSubjectConroller::class,'single_edit'])->name('assign_subject.single_edit');
    Route::post('admin/assign_subject/single_update/{id}',[ClassSubjectConroller::class,'single_update'])->name('assign_subject.single_update');

    // Change Password
    Route::get('admin/change_password', [UserController::class, 'change_password'])->name('admin.c_password');
    Route::post('admin/change_password', [UserController::class, 'update_password'])->name('admin.update_password');


}); 

Route::group(['middleware' => 'teacher'],function(){
    Route::get('teacher/dashboard',[DashController::class,'dashboard']);

    // Change Password
    Route::get('teacher/change_password',[UserController::class,'change_password'])->name('teacher.c_password');
    Route::post('teacher/change_password',[UserController::class,'update_password'])->name('teacher.update_password');

   
});
Route::group(['middleware' => 'student'],function(){
    Route::get('student/dashboard',[DashController::class,'dashboard']);

    // Change Password
    Route::get('student/change_password',[UserController::class,'change_password'])->name('student.c_password');
    Route::post('student/change_password',[UserController::class,'update_password'])->name('student.update_password');

  
});
Route::group(['middleware' => 'parent'],function(){
    Route::get('parent/dashboard',[DashController::class,'dashboard']);

    // Change Password
    Route::get('parent/change_password', [UserController::class, 'change_password'])->name('parent.c_password');
    Route::post('parent/change_password', [UserController::class, 'update_password'])->name('parent.update_password');

});

