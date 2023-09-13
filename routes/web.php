<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('login');
});

Auth::routes();

//Student
Route::middleware(['auth', 'role:Student'])->group(function () {
    Route::get('/student/home', [HomeController::class, 'studentHome'])->name('studentHome');
});

//Faculty
Route::middleware(['auth', 'role:Faculty'])->group(function () {
    Route::get('/faculty/home', [HomeController::class, 'facultyHome'])->name('facultyHome');
});

//Staff
Route::middleware(['auth', 'role:Staff'])->group(function () {
    Route::get('/staff/home', [HomeController::class, 'staffHome'])->name('staffHome');
});

//Clinic
Route::middleware(['auth', 'role:Clinic'])->group(function () {
    Route::get('/clinic/home', [HomeController::class, 'clinicHome'])->name('clinicHome');
});

//Doctor
Route::middleware(['auth', 'role:Doctor'])->group(function () {
    Route::get('/doctor/home', [HomeController::class, 'doctorHome'])->name('doctorHome');
});

//Dentist
Route::middleware(['auth', 'role:Dentist'])->group(function () {
    Route::get('/dentist/home', [HomeController::class, 'dentistHome'])->name('dentistHome');
});

//Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');
});