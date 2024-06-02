<?php

use App\Http\Controllers\CompaniesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout']);

Route::get('/dashboard', [UserController::class,'dashboard']);

Route::get('/create-companies', [CompaniesController::class,'create']);
Route::post('/create-companies', [CompaniesController::class, 'store']);
Route::get('/edit-companies/{company}', [CompaniesController::class, 'showEditComapny']);
Route::put('/edit-companies/{company}', [CompaniesController::class, 'editCompany']);
Route::delete('/delete-companies/{company}', [CompaniesController::class, 'deleteCompany']);