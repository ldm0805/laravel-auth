<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\ProjectController as ProjectController;



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

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);

});

    // /dashboard^


Route::middleware('auth')->group(function () {
    Route::get('/profile', [DashboardController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [DashboardController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [DashboardController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
