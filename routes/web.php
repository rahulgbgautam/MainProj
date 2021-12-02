<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


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
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin','Admin\AdminController@index');
Route::group(['prefix' => 'admin'], function () {
    Route::post('/login','Admin\AdminController@login');
	Route::group(["middleware"=>['admin_auth']],function(){
		Route::get('dashboard','Admin\AdminController@dashboard');
		Route::get('logout','Admin\AdminController@logout');
		Route::Resource('company-management','CompaniesController');	
		Route::Resource('employee-management','EmployeesController');	
	});
	
});
