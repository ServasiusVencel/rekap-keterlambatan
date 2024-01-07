<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatesController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\RayonsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;

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

Route::get('/error-permission', function(){
    return view('errors.permission');
})->name('error.permission');

Route::middleware(['IsGuest'])->group(function () {
    Route::get('/', function(){
        return view('login');
    })->name('login');
    Route::post('/login', [UsersController::class, 'loginAuth'])->name('login.auth');
});


Route::middleware(['IsLogin'])->group(function(){
    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
    Route::get('/home',[DashboardController::class, 'index'] )->name('home');
});

Route::middleware(['admin'])->group(function(){


    Route::prefix('/lates')->name('lates.')->group(function () {
        Route::get('/', [LatesController::class, 'index'])->name('index');
        Route::get('/create', [LatesController::class , 'create'])->name('create');
        Route::get('/rekap', [LatesController::class , 'rekap'])->name('rekap');
        Route::get('/detail/{id}', [LatesController::class , 'detail'])->name('detail');
        Route::post('/store', [LatesController::class , 'store'])->name('store');
        Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
        Route::delete('/{id}', [LatesController::class, 'destroy'])->name('delete');
        Route::get('/print/{id}', [LatesController::class, 'downloadPDF'])->name('print');
        Route::get('/export/excel', [LatesController::class, 'createExcel'])->name('export-excel');
    });
    
    Route::prefix('/rombels')->name('rombels.')->group(function(){
        Route::get('/create', [RombelsController::class, 'create'])->name('create');
        Route::post('/store', [RombelsController::class, 'store'])->name('store');
        Route::get('/', [RombelsController::class, 'index'])->name('index');
        Route::get('/{id}', [RombelsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RombelsController::class, 'update'])->name('update');
        Route::delete('/{id}', [RombelsController::class, 'destroy'])->name('delete');
    
    });
    
    Route::prefix('/rayons')->name('rayons.')->group(function () {
        Route::get('/create', [RayonsController::class , 'create'])->name('create');
        Route::post('/store', [RayonsController::class , 'store'])->name('store');
        Route::get('/', [RayonsController::class , 'index'])->name('home');
        Route::get('/{id}', [RayonsController::class , 'edit'])->name('edit');
        Route::patch('/{id}', [RayonsController::class, 'update'])->name('update');
        Route::delete('/{id}', [RayonsController::class, 'destroy'])->name('delete');
    });
    
    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/create', [UsersController::class , 'create'])->name('create');
        Route::post('/store', [UsersController::class , 'store'])->name('store');
        Route::get('/', [UsersController::class , 'index'])->name('home');
        Route::get('/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UsersController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UsersController::class, 'destroy'])->name('delete');
    });
    
    Route::prefix('/students')->name('students.')->group(function () {
        Route::get('/create', [StudentsController::class , 'create'])->name('create');
        Route::post('/store', [StudentsController::class , 'store'])->name('store');
        Route::get('/', [StudentsController::class , 'index'])->name('home');
        Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [StudentsController::class, 'destroy'])->name('delete');
    });
    
});

Route::middleware(['ps'])->group(function(){
    Route::prefix('/ps')->name('ps.')->group(function(){
        Route::prefix('/lates')->name('lates.')->group(function(){
            Route::get('/', [LatesController::class, 'index'])->name('index');
            Route::get('/rekap', [LatesController::class , 'rekap'])->name('rekap');
            Route::get('/detail/{id}', [LatesController::class , 'detail'])->name('detail');
            Route::get('/print/{id}', [LatesController::class, 'downloadPDF'])->name('print');
            Route::get('/export/excel', [LatesController::class, 'createExcel'])->name('export-excel');
        });

        Route::prefix('/students')->name('students.')->group(function () {
            Route::get('/', [StudentsController::class , 'index'])->name('home');
        });
    });
});
