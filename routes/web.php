<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PropertyTypeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// User fronted all routes

Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Enter profile
    Route::get('/user/profile', [UserController::class, 'UserProfile'])
    ->name('user.profile');

    // edit profile page
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])
    ->name('user.profile.store');

    // logout user
    Route::get('/user/logout', [UserController::class, 'UserLogout'])
    ->name('user.logout');

    // cahnge password
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])
    ->name('user.change.password');

    // save the edited password
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])
    ->name('user.password.update');
});

require __DIR__.'/auth.php';

// admin group middleware

Route::middleware(["auth", "role:admin"])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class,
    'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class,
    'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class,
    'AdminProfile'])->name('admin.profile');

    // updating form data for admin
    Route::post('/admin/profile/store', [AdminController::class,
    'AdminProfileStore'])->name('admin.profile.store');

    // changing password
    Route::get('/admin/profile/password', [AdminController::class,
    'AdminChangePassword'])->name('admin.change.password');

    // updating password admin
    Route::post('/admin/update/password', [AdminController::class,
    'AdminUpdatePassword'])->name('admin.update.password');
});

// agent group middleware

Route::middleware(["auth", "role:agent"])->group(function() {
    Route::get('/agent/dashboard', [AgentController::class,
    'AgentDashboard'])->name('agent.dashboard');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

    // Admin Group Middleware
Route::middleware(['auth','role:admin'])->group(function(){
    // Property Type All Route
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type', 'AllType')->name('all.type');
    });
}); //
