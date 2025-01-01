<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Display Users Table
Route::get('/user', function () {
    $users = App\Models\User::all(); 
    return view('users.index', compact('users')); 
});

// Display Subscriptions Table
Route::get('/subscription', function () {
    $subscriptions = App\Models\Subscription::all(); 
    return view('subscriptions.index', compact('subscriptions')); 
});

// Display Payments Table
Route::get('/payment', function () {
    $payments = App\Models\Payment::all(); 
    return view('payments.index', compact('payments')); 
});

// Display Frequencies Table
Route::get('/frequency', function () {
    $frequencies = App\Models\Frequency::all(); 
    return view('frequencies.index', compact('frequencies')); 
});
//users
Route::resource('users', UserController::class);


Route::get('user/{user_id}/subscriptions', [UserController::class, 'showSubscriptions'])->name('user.subscriptions');
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



//subscriptions
Route::resource('subscriptions', SubscriptionController::class);
Route::post('subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::get('subscriptions/{subscription}/payments', [SubscriptionController::class, 'show'])->name('subscriptions.show');

//payments
Route::get('payments/create/{subscription}', [PaymentController::class, 'create'])->name('payments.create');
Route::get('payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::delete('payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');

//please dont touch these, it takes like 10 mins to generate 3000 dummy data
// and it took me 3 hours to figure that out
// update it took me 6 hours to update the views and reads, as im writing this im stuck trying to figure out how to fix the update for users
