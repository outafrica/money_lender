<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applicants\LoanApplication;
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

Route::get('/apply', function () {
    return view('apply');
});

Route::get('aa_application/apply', function () {
    return view('aa_prepaid');
});

Route::get('/answers', [LoanApplication::class, 'index']);
Route::post('/application/uploads', [LoanApplication::class, 'upload']);
Route::post('/application/send', [LoanApplication::class, 'store']);


Route::group(['prefix' => 'admin'], function(){

    // , 'middleware' => 'admin'

    Route::get('/', function () {
        return view('admin.admin');
    });

    Route::get('{slug}', function () {
        return view('admin.admin');
    });

     //Routes for fetching application details
    Route::get('/applications/all_applications', [AdminController::class, 'index']);
    Route::post('/applications/get_profile', [AdminController::class, 'getProfile']);
    // Route::get('/expenses/expense_sub_types', [AdminExpenseController::class, 'list_expense_subTypes']);
    // Route::post('/expenses/create_expense', [AdminExpenseController::class, 'store']);
    // Route::post('/expenses/edit_expense', [AdminExpenseController::class, 'update']);
    // Route::post('/expenses/delete_expense', [AdminExpenseController::class, 'destroy']);



});




