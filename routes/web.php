<?php
namespace App\Http\Controllers;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/register', [AuthController::class, 'create'])->name('registerView');//show register view
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::get('/login', [AuthController::class, 'show'])->name('loginView');//show login view
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/home', [BookingController::class, 'main'])->name('home');
    //admin
    Route::get('/home/bookings', [BookingController::class, 'showAllBookings'])->name('showAllBookings');
    //user
    Route::get('/home/bookings/user', [BookingController::class, 'showForUser'])->name('showForUser');
    Route::post('/home/bookings/{flight}', [BookingController::class, 'book'])->name('bookFlight');

    //admin
    Route::get('/home/flights', [FlightController::class, 'showAllFlights'])->name('showAllFlights');
    Route::get('/home/users', [UserController::class, 'showAllUsers'])->name('showAllUsers');
    Route::get('/home/users/edit/{user}', [UserController::class, 'editUser'])->name('editUser');
    Route::post('/home/users/edit/{id}', [UserController::class, 'updateUser'])->name('updateUser');
    Route::get('/home/bookings/{uid}/{fid}', [BookingController::class, 'showBooking'])->name('showBooking');
    

    //user
    Route::get('/home/flights/book/{flight}', [FlightController::class, 'edit'])->name('edit');
    Route::get('/home/flights/search', [FlightController::class, 'searchFlights'])->name('searchFlights');
    Route::post('/home/flights/search', [FlightController::class, 'search'])->name('search');
    Route::get('/home/flights/user', [FlightController::class, 'showAll'])->name('showAll');
    

    //admin
    Route::post('/home/users/user', [UserController::class, 'searchUser'])->name('searchUser');
    Route::post('/home/flights/{flight}', [FlightController::class, 'export'])->name('export');
    Route::get('/home/flights/{flight}', [FlightController::class, 'export'])->name('export');
    Route::get('/home/flights/{flight}/cancel', [FlightController::class, 'cancel'])->name('cancel');
    
    Route::get('/home/admin', [UserController::class, 'checkAdmin'])->name('checkAdmin');
});
