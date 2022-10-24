<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TempController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']],function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    /**
     * Student
     */
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::patch('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/student/search', [StudentController::class, 'search'])->name('student.search');
    Route::patch('/student/qrcode/regenerate/{id}', [StudentController::class, 'regenerateQRCode'])->name('student.qrcode.regenerate');
    //Student Requirements
    Route::get('/student/requirement/{id}', [StudentController::class, 'requirement'])->name('student.requirement');
    Route::post('/student/requirement/{id}/store', [StudentController::class, 'requirement_store'])->name('student.requirement.store');
    Route::delete('/student/requirement/delete', [StudentController::class, 'requirement_delete'])->name('student.requirement.delete');
    Route::get('/student/requirement/get-data/{id}', [StudentController::class, 'requirement_get_data'])->name('student.requirement.getdata');
    Route::patch('/student/requirement/update', [StudentController::class, 'requirement_update'])->name('student.requirement.update');
    //Student Import
    Route::get('/student/import', [StudentController::class, 'import'])->name('student.import');
    Route::post('/student/import/store', [StudentController::class, 'importStudent'])->name('student.import.store');
    Route::get('/student/export', [StudentController::class, 'export'])->name('student.export');
    

    /**
     * All User Controller
     */
    Route::get('/auth/users/status/{user_id}/{status_code}', [UserController::class, 'updateStatus'])->name('user.updateStatus');

    /**
     * Teacher
     */
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');

    
    Route::get('/parent', [ParentController::class, 'index'])->name('parent.index');


    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');

    /**
     * Courses
     */
    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::patch('/course/update/{id}', [CourseController::class, 'update'])->name('course.update');

    /**
     * Settings
     */
    //School Info
    Route::get('/settings/school-info', [SettingsController::class, 'school_info'])->name('setting.school_info');
    Route::patch('/settings/school-info/update', [SettingsController::class, 'school_info_update'])->name('setting.school_info.update');
    
    // Academic Settings
    Route::get('/settings/acadamic-year', [SettingsController::class, 'academic_year'])->name('setting.academic_year');
    Route::get('/settings/acadamic-year/create', [SettingsController::class, 'academic_year_create'])->name('setting.academic_year.create');
    Route::post('/settings/acadamic-year/store', [SettingsController::class, 'academic_year_store'])->name('setting.academic_year.store');
    Route::get('/settings/acadamic-year/edit/{id}', [SettingsController::class, 'academic_year_edit'])->name('setting.academic_year.edit');
    Route::patch('/settings/acadamic-year/update/{id}', [SettingsController::class, 'academic_year_update'])->name('setting.academic_year.update');
    Route::patch('/settings/acadamic-year/activate/{id}', [SettingsController::class, 'academic_year_activate'])->name('setting.academic_year.activate');
    
    //Requirements
    Route::get('/settings/requirement', [SettingsController::class, 'requirements'])->name('setting.requirement');
    Route::get('/settings/requirement/create', [SettingsController::class, 'requirement_create'])->name('setting.requirement.create');
    Route::post('/settings/requirement/store', [SettingsController::class, 'requirement_store'])->name('setting.requirement.store');
    Route::get('/settings/requirement/edit/{id}', [SettingsController::class, 'requirement_edit'])->name('setting.requirement.edit');
    Route::patch('/settings/requirement/update/{id}', [SettingsController::class, 'requirement_update'])->name('setting.requirement.update');
    Route::patch('/settings/requirement/activate/{id}', [SettingsController::class, 'requirement_activate'])->name('setting.requirement.activate');
    //Permission
    Route::get('/settings/permission', [SettingsController::class, 'permissions'])->name('setting.permission');
    //announcement
    Route::get('/settings/announcement', [SettingsController::class, 'announcement'])->name('setting.announcement');

    // Themes
    Route::get('/settings/theme', [SettingsController::class, 'theme'])->name('setting.theme');
    Route::patch('/settings/theme/update', [SettingsController::class, 'theme_update'])->name('setting.theme.update');

    //Temporary 
    Route::get('/cashier/temp/students/search', [TempController::class, 'temp_students_search'])->name('temp.student.search');
    Route::get('/cashier/temp/students', [TempController::class, 'temp_students'])->name('temp.student.list');
    Route::get('/cashier/temp/students/{id}/add-payables', [TempController::class, 'temp_students_add_payble'])->name('temp.student.add_payable');
    Route::post('/cashier/temp/students/store', [TempController::class, 'temp_students_add_payble_store'])->name('temp.student.store');

    Route::get('/cashier/temp/payment/index', [TempController::class, 'cashier_index'])->name('temp.cashier.index');
    Route::get('/cashier/temp/payment/student/search', [TempController::class, 'cashier_student_search'])->name('temp.cashier.student.search');
    Route::get('/cashier/temp/payment/search', [TempController::class, 'cashier_search'])->name('temp.cashier.search');
    Route::get('/cashier/temp/payment/{id}/create', [TempController::class, 'cashier_create'])->name('temp.cashier.create');
    Route::post('/cashier/temp/payment/store', [TempController::class, 'cashier_store'])->name('temp.cashier.store');
    Route::delete('/cashier/temp/payment/destroy', [TempController::class, 'cashier_destroy'])->name('temp.cashier.destroy');

    Route::get('/cashier/temp/payment/generatereceipt/{id}', [TempController::class, 'generateReceipt'])->name('payment.generatereceipt');






    /**
     * 
     */
});