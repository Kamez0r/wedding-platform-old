<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;
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


//Auth System
Route::get ('dashboard',    [CustomAuthController::class, 'dashboard']);
Route::get ('login',        [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get ('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration',[CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//Admin Area
Route::get ('admin/manage-users',       [AdminController::class, 'manageUsers'])->name("admin.manageUsers");
Route::get ('admin/manage-users/create',[AdminController::class, 'createUser'])->name("admin.manageUsers.create");
Route::get ('admin/manage-users/view/{user}', [AdminController::class, 'viewUser'])->name("admin.manageUsers.view");
Route::get ('admin/manage-users/edit/{user}', [AdminController::class, 'editUser'])->name("admin.manageUsers.edit");
Route::get ('admin/manage-users/remove/{user}', [AdminController::class, 'removeUser'])->name("admin.manageUsers.remove");


//User Area
Route::get ("user/validate-invitations", [UserController::class, 'validateInvitations'])->name("user.validateInvitations");


