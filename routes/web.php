<?php

use App\Http\Controllers\AllStudentController;
use App\Http\Controllers\CronController;
use App\Http\Controllers\DepartmentChairpersonController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentCoordinatorController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\PlacementProjectController;
use App\Http\Controllers\PlacementSupervisorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkSupervisorController;
use App\Mail\DocumentSubmitted;
use App\Models\Department;
use App\Models\DepartmentCoordinator;
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


Route::get('/', function () {
    if (Auth::user())
        return redirect(route('dashboard'));
    return redirect(route('login'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return redirect(url('/student'));

    })->name('dashboard');
});

Route::resource('student', StudentController::class)->middleware('auth:sanctum');
Route::resource('all_student', AllStudentController::class)->middleware('auth:sanctum');

Route::resource('placement', PlacementController::class)->middleware('auth:sanctum');
Route::resource('work_supervisor', WorkSupervisorController::class)->middleware('auth:sanctum');
Route::resource('placement_supervisor', PlacementSupervisorController::class)->middleware('auth:sanctum');

Route::resource('submission', SubmissionController::class)->middleware('auth:sanctum');
Route::resource('messenger', MessengerController::class)->middleware('auth:sanctum');
Route::resource('meeting', controller: MeetingController::class)->middleware('auth:sanctum');
Route::resource('document', controller: DocumentController::class)->middleware('auth:sanctum');
Route::resource('user', controller: UserController::class)->middleware('auth:sanctum');
Route::resource('report', controller: ReportController::class)->middleware('auth:sanctum');
Route::resource('department', controller: DepartmentController::class)->middleware('auth:sanctum');
Route::resource('department_chairperson', controller: DepartmentChairpersonController::class)->middleware('auth:sanctum');
Route::resource('department_coordinator', controller: DepartmentCoordinatorController::class)->middleware('auth:sanctum');
Route::resource('placement_project', controller: PlacementProjectController::class)->middleware('auth:sanctum');



