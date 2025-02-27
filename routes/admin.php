<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CompaniesController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\PostController;



Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'authenticate'])->name('authenticate');
Route::post('logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth:admin', 'checkAdmin']], function () {


    Route::get('dashboard', [HomeController::class,'index'])->name('dashboard');
    Route::resource('companies', CompaniesController::class);
    Route::get('companies/info/{id}', [CompaniesController::class,'detail']);
    Route::resource('employees', EmployeesController::class);
    Route::get('employees/info/{id}', [EmployeesController::class,'detail']);
    Route::get('autocompleteCompany', [EmployeesController::class,'autocompleteCompany'])->name('autocompleteCompany');
    Route::resource('posts', PostController::class);
});
