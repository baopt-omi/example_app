<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;
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
    return view('welcome');
});

////create user
//Route::get('/users/create',[App\Http\Controllers\UserController::class,'create']);
//Route::post('/users/create',[App\Http\Controllers\UserController::class,'store']);
//
////update user
//Route::get('/users/update/{id}', [App\Http\Controllers\UserController::class, 'edit']);
//Route::post('/users/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
//
////delete user
//Route::get('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);
//
//// Read user
//Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);

Route::get('/remote',[App\Http\Controllers\IssueController::class, 'remotedtb']);

Route::get('/local',[App\Http\Controllers\IssueController::class, 'localdtb']);

//create user
Route::get('/issue/create',[App\Http\Controllers\IssueController::class,'create']);
Route::post('/issue/create',[App\Http\Controllers\IssueController::class,'store']);

//update user
Route::get('/issue/update/{id}', [App\Http\Controllers\IssueController::class, 'edit']);
Route::post('/issue/update/{id}', [App\Http\Controllers\IssueController::class, 'update']);

//delete user
Route::get('/issue/delete/{id}', [App\Http\Controllers\IssueController::class, 'delete']);

Route::get('/issue', [App\Http\Controllers\IssueController::class, 'index']);

Route::get('/sync', [App\Http\Controllers\IssueController::class, 'sync']);

