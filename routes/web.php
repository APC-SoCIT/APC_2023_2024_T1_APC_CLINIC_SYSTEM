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

//On open, redirect to login page 
Route::get('/', function () {
    return redirect('login');
});

Route::get('/login', function(){
    return view('auth.login');
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

//Nurse
Route::middleware(['auth', 'role:Nurse'])->group(function () {
    Route::get('/nurse/home', [HomeController::class, 'nurseHome'])->name('nurseHome');
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