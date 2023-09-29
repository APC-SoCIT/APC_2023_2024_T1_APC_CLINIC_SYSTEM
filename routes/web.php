<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;

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

//On open, redirect to login page 
Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', function(){
    return view('auth.login');
});

Auth::routes();

//No Role
Route::middleware(['auth', 'role:No Role'])->group(function () {
    //homepage
    Route::get('/home', [HomeController::class, 'noRoleHome'])->name('noRoleHome');
});

//Student
Route::middleware(['auth', 'role:Student'])->group(function () {
    //homepage
    Route::get('/student/home', [HomeController::class, 'studentHome'])->name('studentHome');
});

//Faculty
Route::middleware(['auth', 'role:Faculty'])->group(function () {
    //homepage
    Route::get('/faculty/home', [HomeController::class, 'facultyHome'])->name('facultyHome');
});

//Staff
Route::middleware(['auth', 'role:Staff'])->group(function () {
    //homepage
    Route::get('/staff/home', [HomeController::class, 'staffHome'])->name('staffHome');
});

//Nurse
Route::middleware(['auth', 'role:Nurse'])->group(function () {
    //homepage
    Route::get('/nurse/home', [HomeController::class, 'nurseHome'])->name('nurseHome');

    // record //////////////////////////////////////////////////////////////////////////////////////
    Route::resource('/nurse/record', RecordController::class)->names([
        'index' => 'nurse.recordIndex',
        'create' => 'nurse.recordCreate',
        'store' => 'nurse.recordStore',
        'show' => 'nurse.recordShow',
    ])->except([
        'edit', 'update', 'delete'
    ]);;

    //record (Extra)
    Route::get('/record/search', [RecordController::class, 'search'])
        ->name('nurse.recordSearch');

    // inventory ///////////////////////////////////////////////////////////////////////////////////
    Route::resource('/nurse/inventory', InventoryController::class)->names([
        'index' => 'nurse.inventoryIndex',
        'store' => 'nurse.inventoryStore',
    ])->except([
        'show', 'create', 'edit', 'update', 'delete'
    ]);;
    Route::put('/nurse/inventory/{inventoryItem}', [InventoryController::class, 'update'])
        ->name('nurse.inventoryUpdate');

    //inventory (Update Extra)
    Route::put('/nurse/inventory/{inventoryItem}/add', [InventoryController::class, 'add'])
        ->name('nurse.inventoryAdd');
    Route::put('/nurse/inventory/{inventoryItem}/reduce', [InventoryController::class, 'reduce'])
        ->name('nurse.inventoryReduce');
    
    //inventory (Extra)
    Route::get('/inventory/search', [InventoryController::class, 'search'])
        ->name('nurse.inventorySearch');
});

//Doctor
Route::middleware(['auth', 'role:Doctor'])->group(function () {
    //homepage
    Route::get('/doctor/home', [HomeController::class, 'doctorHome'])->name('doctorHome');
});

//Dentist
Route::middleware(['auth', 'role:Dentist'])->group(function () {
    //homepage
    Route::get('/dentist/home', [HomeController::class, 'dentistHome'])->name('dentistHome');
});

//Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    //homepage
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');
});