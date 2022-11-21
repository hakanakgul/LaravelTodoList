<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', "UserMiddleware"])
    ->group(function () {
        Route::get("/user/home", [UserController::class, "index"])->name("user.homepage");
    });


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', "AdminMiddleware"])
    ->group(function () {
        Route::get("/admin/home", [AdminController::class, "index"])->name("admin.homepage");
    });

// Route::redirect('/', '/login');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');