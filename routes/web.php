<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FriendRequestController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Display all users and pending friend requests
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Send a friend request
    Route::post('/friend-requests/{user}', [FriendRequestController::class, 'send'])->name('users.sendFriendRequest');

    // Accept a friend request
    Route::post('/users/{friendRequest}/decline', [FriendRequestController::class, 'decline'])->name('users.declineRequest');
    // Accept a friend request
    Route::post('/users/{friendRequest}/accept', [FriendRequestController::class, 'accept'])->name('users.acceptRequest');

    Route::patch('/users/{friendRequest}/accept', [FriendRequestController::class, 'accept'])->name('users.acceptRequest');


});

require __DIR__.'/auth.php';
