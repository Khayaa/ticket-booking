<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\auth\AdminLoginController;
use App\Http\Controllers\Admin\auth\AdminLogoutController;
use App\Http\Controllers\Admin\dasboard;
use App\Http\Controllers\Admin\auth\AdminRegisterController;
use App\Http\Controllers\Admin\CreateEventController;
use App\Http\Controllers\Admin\EditEventController;
use App\Http\Controllers\Admin\eventsController;
use App\Http\Controllers\Admin\ticketController;
use App\Http\Controllers\Admin\EditUserController;
use App\Http\Controllers\EventDetails;
use App\Http\Controllers\user\UserEvents;
use App\Http\Controllers\user\UserTickets;
use App\Http\Controllers\ShowAllEventsController;
use App\Http\Controllers\User\ViewTicket;
use App\Http\Livewire\BookEventComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/' , [ShowAllEventsController::class , 'show'])->name('guest');
Route::view('about', 'about')->name('about');
Route::get('/event-details/{id}', [EventDetails::class , 'show'])->name('event-details');
Route::get('/allevents' , [ShowAllEventsController::class ,'show'])->name('all-events');

Route::middleware('auth')->group(function () {
    Route::get('user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/allevents' , [ShowAllEventsController::class ,'show'])->name('all-events');

    Route::get('/user/ticket' , [UserTickets::class , 'show'])->name('user.tickets');
    Route::get('/user/events' , [UserEvents::class , 'show'])->name('user.events');
    Route::get('/event/book-event/{slug}',BookEventComponent::class)->name('book-event');

    Route::get('/user/ticket/download', [ViewTicket::class , 'show'])->name('ticket.download');

    Route::get('/user/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('/user/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');



});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware('guest:admin')->group(function (){
    Route::get('/register' , [AdminRegisterController::class , 'show'])->name('register.show');
    Route::post('/register' , [AdminRegisterController::class , 'create'])->name('register.create');

    Route::get('/login' , [AdminLoginController::class , 'show'])->name('login.show');
    Route::post('/login' , [AdminLoginController::class , 'login'])->name('login');
   });

   Route::middleware(['is_approved' , 'auth:admin'])->group(function (){
    Route::get('/dashboard' , [dasboard::class , 'show'])->name('dashboard');
    Route::get('/profile' , [AdminProfileController::class , 'show'])->name('profile');
    Route::put('/profile' , [AdminProfileController::class , 'update'])->name('profile.update');
    Route::get('/tickets' , [ticketController::class , 'show'])->name('tickets');
    Route::post('/logout' , [AdminLogoutController::class , 'logout'])->name('logout');
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/{id}', [EditUserController::class , 'show'])->name('user.edit');
    Route::put('/users/{id}', [EditUserController::class , 'updateUser'])->name('user.update');
    Route::delete('/users/{id}' , [\App\Http\Controllers\UserController::class, 'deleteUser'])->name('delete-user');


   Route::get('/events' , [eventsController::class , 'show'])->name('events');
    Route::get('/events/create', [CreateEventController::class , 'show'])->name('event.show');
    Route::post('/events/create', [CreateEventController::class , 'create'])->name('event.create');
    Route::get('/events/edit/{id}', [EditEventController::class , 'show'])->name('event.edit.show');
    Route::put('/events/edit/{id}', [EditEventController::class , 'update'])->name('event.update');
    Route::delete('/events/{id}' , [eventsController::class, 'deleteEvent'])->name('delete-event');
   });

});


