<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Account;
use App\Models\PersonalInfo;

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

// Route::get('/user/dashboard', function () {
//     return view('user.dashboard');
// })->name('mchongo');

//Send money
Route::get('/user/sendmoney', function () {
    return view('user.sendmoney');
})->name('sendmoney');

Route::post('/user/send', [AccountController::class, 'deposit'])->name('send');



//Create Account 
Route::get('/account/create', [AccountController::class, 'index'])->name('create.account');

Route::post('/account/add', [AccountController::class, 'addAccount'])->name('add.account');



// Personal info controller 
Route::get('/personInfo', [PersonalInfoController::class, 'index'])->name('personal.info');

Route::post('/personInfo/add', [PersonalInfoController::class, 'addInfo'])->name('store.info');


//admin
// Route::get('/accounts/total', function () {
//     $users = User::all();
//     return view('admin.totalAccounts', compact('users'));
// })->name('totalAccounts');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin'
])->group(function () {
    Route::get('/admin/dashboard', [AccountController::class, 'adminDashboard'])->name('admin.dashboard');
});





//Admin
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/users', function () {

        $users = User::all();

        return view('admin.users', compact('users'));
    })->name('users');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/accounts', [AccountController::class, 'allAcc'])->name('accounts');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () { Route::get('/account/edit/{id}', [AccountController::class, 'editAcc']);});

Route::post('/account/update/{id}', [AccountController::class, 'updateAcc']);

Route::get('/softdelete/account/{id}', [AccountController::class, 'softdelete']);

Route::get('/restore/account/{id}', [AccountController::class, 'restore']);

Route::get('/pdelete/account/{id}', [AccountController::class, 'pdelete']);



Route::get('/dashboard', [AccountController::class, 'display'])->name('dashboard');

Route::get('/admin/logout', [Controller::class, 'logoutAdmin'])->name('admin.logout');

Route::get('/print', [AccountController::class, 'print'])->name('print');

Route::get('/account/status/{id}', [AccountController::class, 'change_status'])->name('status');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
