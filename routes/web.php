<?php

use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\CreateEventController;
use App\Http\Controllers\admin\dasboard;
use App\Http\Controllers\admin\EditEventController;
use App\Http\Controllers\admin\eventsController;
use App\Http\Controllers\admin\ticketController;
use App\Http\Controllers\admin\EditUserController;
use App\Http\Controllers\admin\ShowEventsController;
use App\Http\Controllers\user\UserEvents;
use App\Http\Controllers\user\UserTickets;
use App\Http\Controllers\ShowAllEventsController;
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

Route::get('/' , [ShowEventsController::class , 'show'])->name('guest');    
Route::view('about', 'about')->name('about');

Route::middleware('auth')->group(function () {

    Route::get('user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/allevents' , [ShowAllEventsController::class ,'show'])->name('all-events');

    Route::get('/user/ticket' , [UserTickets::class , 'show'])->name('user.tickets');
    Route::get('/user/events' , [UserEvents::class , 'show'])->name('user.events');
    Route::get('/event/book-event/{id}',BookEventComponent::class)->name('book-event');
  
    

    Route::get('/user/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('/user/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');


    Route::prefix('admin')->middleware(["is_admin"])->name('admin.')->group(function(){
        Route::get('/dashboard' , [dasboard::class , 'show'])->name('dashboard');

        Route::get('/profile' , [AdminProfileController::class , 'show'])->name('profile');
        Route::get('/tickets' , [ticketController::class , 'show'])->name('tickets');

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
