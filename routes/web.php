<?php

use Illuminate\Support\Facades\Route;

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

//please dont touch these, it takes like 10 mins to generate 3000 dummy data
// and it took me 3 hours to figure that out