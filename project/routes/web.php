<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QAManagerController; 

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

Auth::routes(['register' => false, 'reset' => false]);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect()->route('home');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [UserController::class, 'index'])->name('user.profile'); 
    Route::get('changepassword', [UserController::class, 'changepassword'])->name('user.changepassword');    Route::group(['prefix' => 'ideas'], function () {
        Route::get('/', [IdeaController::class,'index'])->name('ideas.index');
    });
});

Route::get('/HomeQaManager', [QaManagerController::class, 'index'])->name('dashboard');
Route::get('/dashboard',function () {
    return redirect()->route('dashboard');
});

Route::get('/HomeQaManager/sendReport', [QaManagerController::class, 'sendReport'])->name('sendReport');
Route::get('/sendReport',function () {
    return redirect()->route('sendReport');
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


