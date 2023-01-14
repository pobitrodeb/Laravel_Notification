<?php

use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/send-notifications', function(){
    $user = User::find(2);
    //  $user->notify(new EmailNotification());
    // Notification::send($user, new EmailNotification());
    $users = User::all();
    foreach($users as $user)
    {
        Notification::send($users, new EmailNotification() );
    }
    return redirect()->back();
});
