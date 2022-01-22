<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DocumentAndMediaController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LMSController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\SalaryRecordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EndUserController;
use App\Models\SalaryRecord;
use App\Http\Controllers\SalaryStructureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Livewire\ClientsLiveWire;
use App\Http\Controllers\UserController;
use Aws\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\DesiginationController;
use App\Http\Controllers\RoleController;

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

// Route::get('admin/employees/employee/showid/{employee}', [EmployeeController::class, 'showid'])->middleware(['auth']);
Route::redirect('/', 'login');

// 

Route::get('/admin/users/updateUserPassword/{$id}', [UserController::class,"updateUserPassword"])->middleware(['auth'])->name('updateUserPassword');

Route::get('/verify', [RegisteredUserController::class,'verifyuser'])->name('verify.user');
Route::get('test-email', [MailController::class,'sendEmail'])->name('test-email');
Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');





Route::get('admin/users/updateUserPassword/{id}', [UserController::class,'updateUserPassword'])->middleware(['auth']);
// Route::get('/dashboard_admin', function () {
// 	return view('dashboard_admin');
// })->middleware(['auth'])->name('dashboard_admin');

Route::get('/dashboardController', [DashboardController::class,"index"])->middleware(['auth','verified'])->name('dashboardController');

// Route::middleware(['auth', 'verified'])->get('/dashboardController', [DashboardController::class,"index"]);

Route::prefix('learning-management')->middleware(['admin'])->group(function () {
	Route::get('', [LMSController::class, "index"])->name('lms.index');
	Route::get('courses', [CourseController::class, "index"])->name('courses.index');
	Route::get('courses/create', [CourseController::class, "create"])->name('courses.create');
	Route::get('courses/{course}', [CourseController::class, "show"])->name('courses.show');

	Route::get('courses/{course}/lesson/create', [CourseController::class, "createLesson"])->name('courses.lesson.create');
	Route::post('courses/{course}/lesson/create', [CourseController::class, "storeLesson"])->name('courses.lesson.store');
	Route::get('courses/{course}/lesson/{lesson}', [CourseController::class, "showLesson"])->name('courses.lesson');
	Route::get('courses/{course}/lesson/edit/{lesson}', [CourseController::class, "editLesson"])->name('courses.lesson.edit');
	Route::post('courses/{course}/lesson/edit/{lesson}', [CourseController::class, "updateLesson"])->name('courses.lesson.update');
});

//Grouped as per Roles

//-----------Begining Auth Role-----------------

Route::group(['middleware' => 'auth'], function () {
	Route::group([
		'prefix' => 'admin',
		'midddleware' => 'auth',
		'as' => 'admin.'

	], function () {
		Route::resource('employees', EmployeeController::class);
		Route::resource('assets', AssetController::class);
		Route::resource('salary', SalaryStructureController::class);
		Route::resource('leave', LeaveController::class);
		Route::resource('attendance', AttendanceController::class);
		Route::resource('tasks', TaskController::class);
		Route::resource('projects', ProjectController::class);
		Route::resource('clients', ClientController::class);
		Route::resource('users', UserController::class);
		Route::resource('roles', RoleController::class);
		Route::resource('desiginations', DesiginationController::class);
		
		
	});

	Route::group([
		'prefix' => 'user',
		'midddleware' => 'auth',
		'as' => 'user.'

	], function () {
		Route::resource('end_users', EndUserController::class);
	});


	Route::group([
		'prefix' => 'payroll',
		'middleware' => 'auth',
		'as' => 'admin.'
	], function () {
		Route::get('/', [SalaryRecordController::class,  'index'])->name('payslip.index');
		Route::post('/', [SalaryRecordController::class,  'store'])->name('payslip.store');
		Route::get('/destroy/{salary_record}', [SalaryRecordController::class,  'delete'])->name('payslip.destroy');
	});

	Route::group([
		'prefix' => 'playground',
		'middleware' => 'auth',
		'as' => 'admin.'
	], function () {
		Route::get('file-upload', [PlaygroundController::class, "getFileUpload"])->name('playground.get-file-upload');
		Route::post('file-upload', [PlaygroundController::class, "postFileUpload"])->name('playground.post-file-upload');
	});

	Route::group([
		'prefix' => 'documents-and-media/{media}',
		'middleware' => 'auth',
		'as' => 'admin.'
	], function () {
		Route::get('delete-media', [DocumentAndMediaController::class, "deleteFile"])->name('delete-file');
	});
});

//-----------End Group Role Auth-----------

Route::put('salary/calculate', [SalaryStructureController::class, 'calculate'])->middleware(['auth']);
Route::get('export_pdf/{id}', [EmployeeController::class, 'downloadPdf'])->name('export_pdf');




require __DIR__ . '/auth.php';
