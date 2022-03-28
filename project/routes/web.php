<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermOfUseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QAManagerController; 
use App\Http\Controllers\QAManager\MissionController;

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

Auth::routes(['register' => false, 'reset' => false, 'logout' => false]);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/privacy', [PrivacyController::class,'index'])->name('privacy');
Route::get('/term', [TermOfUseController::class,'index'])->name('term');
Route::post('/contact', [ContactController::class, 'index'])->name('contact');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [UserController::class, 'index'])->name('user.profile');
    Route::post('profile', [UserController::class, 'uploadAvatar'])->name('user.uploadAvatar');
    //Route for showing changing password form
    Route::get('change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
    //Route for changing password
    Route::get('update-password', [UserController::class, 'updatePassword']);
    Route::post('update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    //Route for modifying phone number
    Route::get('change-phone-number', [UserController::class, 'changePhoneNumber']);
    Route::post('change-phone-number', [UserController::class, 'changePhoneNumber'])->name('user.changePhoneNumber');

    Route::group(['prefix' => 'ideas'], function () {
        Route::get('/', [IdeaController::class, 'index'])->name('ideas.index');
        Route::post('store', [IdeaController::class, 'store'])->name('ideas.store');
    });

<<<<<<< HEAD
Route::get('/HomeQaManager', [QaManagerController::class, 'index'])->name('dashboard');
Route::get('/dashboard',function () {
    return redirect()->route('dashboard');
});

Route::get('/HomeQaManager/sendReport', [QaManagerController::class, 'sendReport'])->name('sendReport');
Route::get('/sendReport',function () {
    return redirect()->route('sendReport');
});

Route::get('/HomeQaManager/detailDepartment', [QaManagerController::class, 'detail'])->name('detailDepartment');
Route::get('/detailDepartment',function () {
    return redirect()->route('detailDepartment');
=======
    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::group(['prefix' => 'account'], function () {
            Route::get('/', [AccountController::class, 'index'])->name('admin.account.index');
            Route::get('/dt-row-data', [AccountController::class, 'getDtRowData']);
            Route::delete('/delete/{id}', [AccountController::class, 'delete'])->name('admin.account.delete');
            Route::post('/create', [AccountController::class, 'create'])->name('admin.account.create');
            Route::get('/update/{id}', [AccountController::class, 'edit'])->name('admin.account.update');
            Route::post('/update/{id}', [AccountController::class, 'update'])->name('admin.account.store');
        });

        // Category
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [CategoryController::class, 'indexCategory'])->name('admin.category.index');
            Route::get('/dt-row-data', [CategoryController::class, 'getDtRowData']);
            Route::post('/create', [CategoryController::class, 'create'])->name('admin.category.createCate');
            Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
            Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('admin.category.update');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.store');
        });

        //Department
        Route::group(['prefix' => 'department'], function () {
            Route::get('/', [DepartmentController::class, 'indexDepartment'])->name('admin.department.index');
            Route::get('/dt-row-data', [DepartmentController::class, 'getDtRowData']);
            Route::post('/createDpm', [DepartmentController::class, 'create'])->name('admin.department.createDpm');
            Route::delete('/delete/{id}', [DepartmentController::class, 'delete'])->name('admin.department.delete');
            Route::get('/update/{id}', [DepartmentController::class, 'edit'])->name('admin.department.update');
            Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('admin.department.store');
        });
        //Semester
        Route::group(['prefix' => 'semester'], function () {
            Route::get('/', [SemesterController::class, 'indexSemester'])->name('admin.semester.index');
            Route::get('/dt-row-data', [SemesterController::class, 'getDtRowData']);
            Route::post('/createSmt', [SemesterController::class, 'create'])->name('admin.semester.createSmt');
            Route::delete('/delete/{id}', [SemesterController::class, 'delete'])->name('admin.semester.delete');
            Route::get('/update/{id}', [SemesterController::class, 'edit'])->name('admin.semester.update');
            Route::post('/update/{id}', [SemesterController::class, 'update'])->name('admin.semester.store');
        });

        //Mission
        Route::get('/missions/', [MissionController::class, 'index'])->name('admin.missions.index');
        Route::get('/missions/dt-row-data', [MissionController::class, 'getDtRowData']);
        Route::post('/mission/create', [MissionController::class, 'create'])->name('admin.mission.create');
        Route::get('/mission/update/{id}', [MissionController::class, 'edit'])->name('admin.mission.update');
        Route::post('/mission/update/{id}', [MissionController::class, 'update'])->name('admin.mission.store');
        Route::delete('/missions/delete/{id}',[MissionController::class,'delete'])->name('admin.mission.delete');

        // List mission by category|department|semester
        Route::get('/missions/category/{id}', [MissionController::class, 'listMissionByCategory'])->name('admin.missions.category.index');
        Route::get('/missions/category/{id}/dt-row-data', [MissionController::class, 'getDtRowDataByCategory']);
        Route::get('/missions/department/{id}', [MissionController::class, 'listMissionByDepartment'])->name('admin.missions.department.index');
        Route::get('/missions/department/{id}/dt-row-data', [MissionController::class, 'getDtRowDataByDepartment']);
        Route::get('/missions/semester/{id}', [MissionController::class, 'listMissionBySemester'])->name('admin.missions.semester.index');
        Route::get('/missions/semester/{id}/dt-row-data', [MissionController::class, 'getDtRowDataBySemester']);
    });

    
>>>>>>> origin/admin
});
Route::get('/Report', function(){
    return view('/QAManager/sendReport');
});
Route::post('/Report', function(){
    $data = request(['department','user','reason']);
    \Illuminate\Support\Facades\Mail::to('phungdat020501@gmail.com')
    -> send(new \App\Mail\Report($data));
    return redirect ('/HomeQaManager/sendReport')
    -> with('flash', 'Report sent successfully');
});
 // Category
 Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'indexCategory'])->name('QAManager.category.index');
    Route::get('/dt-row-data', [CategoryController::class, 'getDtRowData']);
    Route::post('/create', [CategoryController::class, 'create'])->name('QAManager.category.createCate');
    Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('QAManager.category.delete');
    Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('QAManager.category.update');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('QAManager.category.store');
});

//Department
Route::group(['prefix' => 'department'], function () {
    Route::get('/', [DepartmentController::class, 'indexDepartment'])->name('QAManager.department.index');
    Route::get('/dt-row-data', [DepartmentController::class, 'getDtRowData']);
    Route::post('/createDpm', [DepartmentController::class, 'create'])->name('QAManager.department.createDpm');
    Route::delete('/delete/{id}', [DepartmentController::class, 'delete'])->name('QAManager.department.delete');
    Route::get('/update/{id}', [DepartmentController::class, 'edit'])->name('QAManager.department.update');
    Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('QAManager.department.store');
});
//Semester
Route::group(['prefix' => 'semester'], function () {
    Route::get('/', [SemesterController::class, 'indexSemester'])->name('QAManager.semester.index');
    Route::get('/dt-row-data', [SemesterController::class, 'getDtRowData']);
    Route::post('/createSmt', [SemesterController::class, 'create'])->name('QAManager.semester.createSmt');
    Route::delete('/delete/{id}', [SemesterController::class, 'delete'])->name('QAManager.semester.delete');
    Route::get('/update/{id}', [SemesterController::class, 'edit'])->name('QAManager.semester.update');
    Route::post('/update/{id}', [SemesterController::class, 'update'])->name('QAManager.semester.store');
});
//Mission
Route::get('missions', [MissionController::class, 'index'])->name('QAManager.missions.index');
Route::get('/missions/dt-row-data', [MissionController::class, 'getDtRowData']);
Route::post('/mission/create', [MissionController::class, 'create'])->name('QAManager.mission.create');
Route::get('/mission/update/{id}', [MissionController::class, 'edit'])->name('QAManager.mission.update');
Route::post('/mission/update/{id}', [MissionController::class, 'update'])->name('QAManager.mission.store');
Route::delete('/missions/delete/{id}',[MissionController::class,'delete'])->name('QAManager.mission.delete');
 // List mission by category|department|semester
 Route::get('/missions/category/{id}', [MissionController::class, 'listMissionByCategory'])->name('QAManager.missions.category.index');
 Route::get('/missions/category/{id}/dt-row-data', [MissionController::class, 'getDtRowDataByCategory']);
 Route::get('/missions/department/{id}', [MissionController::class, 'listMissionByDepartment'])->name('QAManager.missions.department.index');
 Route::get('/missions/department/{id}/dt-row-data', [MissionController::class, 'getDtRowDataByDepartment']);
 Route::get('/missions/semester/{id}', [MissionController::class, 'listMissionBySemester'])->name('QAManager.missions.semester.index');
 Route::get('/missions/semester/{id}/dt-row-data', [MissionController::class, 'getDtRowDataBySemester']);


