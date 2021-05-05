<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->group(function () { 
    Route::get('/user', [UserController::class, 'index'])->name('dashboard.users');
    Route::get('/supervisor', [SupervisorController::class, 'index'])->name('dashboard.supervisor');
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard.admin');
});

Route::prefix('submission')->group(function () { 
    Route::get('/user', [UserController::class, 'index'])->name('submission.users');
    Route::put('/user/invoice/{id}', [UserController::class, 'invoice'])->name('submission.user.invoice');


    
    Route::get('/supervisor', [SupervisorController::class, 'index'])->name('submission.supervisor');
    Route::put('/supervisor/{id}', [SupervisorController::class, 'update'])->name('submission.supervisor.approve');
  
   
    
    Route::get('/admin', [AdminController::class, 'index'])->name('submission.admin');
    Route::put('/edit/{id}', [AdminController::class, 'edit'])->name('submission.admin.edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('submission.admin.update');

    //crud 
    Route::get('/add', [SubmissionController::class, 'create'])->name('submission.create');
    Route::post('/add', [SubmissionController::class, 'store'])->name('submission.store');
    Route::put('/download/{id}', [SubmissionController::class, 'download'])->name('submission.file');
});