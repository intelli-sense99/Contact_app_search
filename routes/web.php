<?php

use App\Http\Controllers\Subscriber_controller;
use App\Http\Controllers\Contact_controller;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\AuthenticatedMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Models\subscriber;
use App\Models\contact;
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

Route::get('/create/signup', [Subscriber_controller::class, 'create'])->name('subject.create')->middleware(GuestMiddleware::class);
Route::post('/store', [Subscriber_controller::class, 'store'])->name('subject.store')->middleware(GuestMiddleware::class);
Route::get('/create/list', [Subscriber_controller::class, 'Users_list'])->name('subject.usersList');

// url method to get id
Route::get('/user/delete/{id}', [Subscriber_controller::class, 'deleteUser'])->name('subject.deleteUser');
Route::get('/user/edit/{id}', [Subscriber_controller::class, 'editUser'])->name('subject.editUser');
Route::post('/user/update', [Subscriber_controller::class, 'updateUser'])->name('subject.updateUser');
// user detail
Route::get('/user/detail', [Subscriber_controller::class, 'userDetail'])->name('subject.userDetail');


// login
Route::get('/login', [Subscriber_controller::class, 'loginUser'])->name('subject.loginUser')->middleware(GuestMiddleware::class);
Route::post('/login/store', [Subscriber_controller::class, 'loginStore'])->name('subject.loginStore')->middleware(GuestMiddleware::class);
// logout
Route::get('/logout', [Subscriber_controller::class, 'logout'])->name('subject.logout');

// dashboard
Route::get('/dashboard', [Contact_controller::class, 'dashboard'])->name('subject.dashboard')->middleware(AuthenticatedMiddleware::class);
// contact
Route::get('/contact/add', [Contact_controller::class, 'contactAdd'])->name('subject.contactAdd')->middleware(AuthenticatedMiddleware::class);
Route::post('/contact/store', [Contact_controller::class, 'contactStore'])->name('subject.contactStore')->middleware(AuthenticatedMiddleware::class);

Route::get('/contact/list', [Contact_controller::class, 'contactList'])->name('subject.contactList')->middleware(AuthenticatedMiddleware::class);
Route::get('/contact/delete/{id}', [Contact_controller::class, 'deleteContact'])->name('subject.deleteContact')->middleware(AuthenticatedMiddleware::class);
Route::get('/contact/edit/{id}', [Contact_controller::class, 'editContact'])->name('subject.editContact')->middleware(AuthenticatedMiddleware::class);
Route::post('/contact/update/', [Contact_controller::class, 'updateContact'])->name('subject.updateContact')->middleware(AuthenticatedMiddleware::class);

// profile
// Route::get('/contact/profile/{id}', [Contact_controller::class, 'profile'])->name('subject.profile')->middleware(AuthenticatedMiddleware::class);

// search
Route::get('/search', [Contact_controller::class, 'search'])->name('contact.search')->middleware(AuthenticatedMiddleware::class);
