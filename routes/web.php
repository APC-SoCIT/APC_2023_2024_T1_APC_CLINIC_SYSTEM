<?php

use App\Http\Controllers\DentalExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalExamController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ConsultationController;
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
        'store' => 'nurse.recordStore',
        'show' => 'nurse.recordShow',
        'edit' => 'nurse.recordEdit',
        'update' => 'nurse.recordUpdate',
    ])->except([
        'create', 'delete'
    ]);
    
    // record alternatives
    Route::get('/nurse/record/create/{user}', [RecordController::class, 'create'])
        ->name('nurse.recordCreate');

    // record (Extra)
    Route::get('/record/search', [RecordController::class, 'search'])
    ->name('nurse.recordSearch');
        
    // record (Consultation part) //////////////////////////////////////////////////////////////////
    Route::resource('nurse/record/consultation', ConsultationController::class)->names([
        'store' => 'nurse.consultationStore',
        'edit' => 'nurse.consultationEdit',
        'update' => 'nurse.consultationUpdate',
    ])->except([
        'index', 'create', 'delete'
    ]);

    // record (Consultation part) (Extra)
    Route::get('/nurse/record/{record}/consultation/', [ConsultationController::class, 'date'])
        ->name('nurse.consultationDate');
    
    // record (Consultation part) (Alternatives)
    Route::get('/nurse/record/consultation/create/{record}', [ConsultationController::class, 'create'])
        ->name('nurse.consultationCreate');

    // record (Medical Exam part) //////////////////////////////////////////////////////////////////
    Route::resource('nurse/record/medical-exam', MedicalExamController::class)->names([
        'store' => 'nurse.medicalExamStore',
        'edit' => 'nurse.medicalExamEdit',
        'update' => 'nurse.medicalExamUpdate',
    ])->except([
        'index', 'create', 'delete'
    ]);

    // record (Medical Exam part) (Extra)
    Route::get('/nurse/record/{record}/medical-exam/', [MedicalExamController::class, 'date'])
        ->name('nurse.medicalExamDate');

    // record (Medical Exam part) (Alternatives)
    Route::get('/nurse/record/medical-exam/create/{record}', [MedicalExamController::class, 'create'])
        ->name('nurse.medicalExamCreate');

    // record (Dental Exam part) (Extra) ///////////////////////////////////////////////////////////
    Route::get('/nurse/record/{record}/dental-exam/', [DentalExamController::class, 'date'])
        ->name('nurse.dentalExamDate');

    // inventory ///////////////////////////////////////////////////////////////////////////////////
    Route::resource('/nurse/inventory', InventoryController::class)->names([
        'index' => 'nurse.inventoryIndex',
        'store' => 'nurse.inventoryStore',
    ])->except([
        'show', 'create', 'edit', 'update', 'delete'
    ]);;

    // inventory alternatives
    Route::put('/nurse/inventory/{inventoryItem}', [InventoryController::class, 'update'])
        ->name('nurse.inventoryUpdate');

    // inventory (Update Extra)
    Route::put('/nurse/inventory/{inventoryItem}/add', [InventoryController::class, 'add'])
        ->name('nurse.inventoryAdd');
    Route::put('/nurse/inventory/{inventoryItem}/reduce', [InventoryController::class, 'reduce'])
        ->name('nurse.inventoryReduce');
    
    // inventory (Extra)
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
    // record //////////////////////////////////////////////////////////////////////////////////////
    Route::resource('/dentist/record', RecordController::class)->names([
        'index' => 'dentist.recordIndex',
        'show' => 'dentist.recordShow',
    ])->except([
        'create', 'store', 'edit', 'update', 'delete'
    ]);

    // record (Extra)
    Route::get('/dentist/search', [RecordController::class, 'search'])
    ->name('dentist.recordSearch');
        
    // record (Consultation part) (Extra) /////////////////////////////////////////////////////////
    Route::get('/dentist/record/{record}/consultation/', [ConsultationController::class, 'date'])
        ->name('dentist.consultationDate');

    // record (Medical Exam part) (Extra) /////////////////////////////////////////////////////////
    Route::get('/dentist/record/{record}/medical-exam/', [MedicalExamController::class, 'date'])
        ->name('dentist.medicalExamDate');

    // record (Dental Exam part) //////////////////////////////////////////////////////////////////
    Route::resource('dentist/record/dental-exam', DentalExamController::class)->names([
        'store' => 'dentist.dentalExamStore',
        'edit' => 'dentist.dentalExamEdit',
        'update' => 'dentist.dentalExamUpdate',
    ])->except([
        'index', 'create', 'delete'
    ]);

    // record (Dental Exam part) (Extra)
    Route::get('/dentist/record/{record}/dental-exam/', [DentalExamController::class, 'date'])
        ->name('dentist.dentalExamDate');

    // record (Dental Exam part) (Alternatives)
    Route::get('/dentist/record/dental-exam/create/{record}', [DentalExamController::class, 'create'])
        ->name('dentist.dentalExamCreate');
});

//Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    //homepage
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');
});