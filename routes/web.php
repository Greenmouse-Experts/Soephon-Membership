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

// Member
Route::get('/', [App\Http\Controllers\HomePageController::class, 'login'])->name('login');
Route::post('/member/login', [App\Http\Controllers\HomePageController::class, 'post_member_login'])->name('member.login');

Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');
Route::get('/test', [App\Http\Controllers\HomePageController::class, 'store']);

// Member
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/member/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/member/avatar/{id}', [App\Http\Controllers\HomeController::class, 'upload_avatar'])->name('upload-avatar');
Route::post('/member/profile/update/{id}', [App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile.update');
Route::get('/member/my/dues', [App\Http\Controllers\HomeController::class, 'my_dues'])->name('my.dues');
Route::get('/member/dues', [App\Http\Controllers\HomeController::class, 'dues'])->name('dues');
Route::post('/member/make/payment/{id}', [App\Http\Controllers\HomeController::class, 'make_payment'])->name('payment');
Route::get('/member/payment/callback', [App\Http\Controllers\HomeController::class, 'handleGatewayCallback'])->name('handleGatewayCallback');
Route::get('/member/payment/history', [App\Http\Controllers\HomeController::class, 'payment_history'])->name('payment.history');

// Admin
Route::get('/admin/login', [App\Http\Controllers\HomePageController::class, 'admin_login']);
Route::post('/login', [App\Http\Controllers\HomePageController::class, 'post_admin_login'])->name('admin.login');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/add/member', [App\Http\Controllers\AdminController::class, 'member'])->name('admin.member');
    Route::post('/admin/add/member', [App\Http\Controllers\AdminController::class, 'add_member'])->name('admin.add.member');
    Route::get('/admin/view/members', [App\Http\Controllers\AdminController::class, 'view_members'])->name('admin.view.members');
    Route::post('/admin/update/member/{id}', [App\Http\Controllers\AdminController::class, 'update_member'])->name('admin.update.member');
    Route::get('/admin/delete/member/{id}', [App\Http\Controllers\AdminController::class, 'delete_member'])->name('admin.delete.member');
    Route::get('/admin/add/due', [App\Http\Controllers\AdminController::class, 'due'])->name('admin.due');
    Route::post('/admin/add/due', [App\Http\Controllers\AdminController::class, 'add_due'])->name('admin.add.due');
    Route::get('/admin/view/dues', [App\Http\Controllers\AdminController::class, 'view_dues'])->name('admin.view.dues');
    Route::get('/admin/delete/dues/{id}', [App\Http\Controllers\AdminController::class, 'delete_due'])->name('admin.delete.due');
    Route::get('/admin/view/payments', [App\Http\Controllers\AdminController::class, 'view_payments'])->name('admin.view.payments');
    Route::get('/admin/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/avatar/{id}', [App\Http\Controllers\AdminController::class, 'upload_avatar'])->name('admin.upload-avatar');
    Route::post('/admin/update/password/{id}', [App\Http\Controllers\AdminController::class, 'update_password'])->name('admin.update.password');
    Route::post('/admin/profile/update/{id}', [App\Http\Controllers\AdminController::class, 'profile_update'])->name('admin.profile.update');
});