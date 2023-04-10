<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\ProductController;

use Illuminate\Http\Request;

use App\Http\Controllers\Tripay\TripayCallbackController;

use App\Http\Controllers\checkoutController;

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
    return view('main');
});
Route::get('search', [ProductController::class, 'index']);
Route::get('car_details', [ProductController::class, 'details']);


Route::get('/redirect', function (Request $request) {

    return redirect()->to('/transaction/' . $request->input('tripay_reference'));

});

Route::middleware('AuthNoLogin')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');


});

Route::middleware('AuthCheck')->group(function () {
    Route::get('{id}/checkout', [checkoutController::class, 'select_payment']);
    Route::post('{id}/post_checkout', [checkoutController::class, 'store'])->name('payment.post');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('transaction', [checkoutController::class, 'transaction']);
    Route::get('transaction/{id}', [checkoutController::class, 'details_transaction']);

    Route::get('profile', [AuthController::class, 'profile'])->name('profile');

    Route::post('post-profile', [AuthController::class, 'profile_update'])->name('update.profile');

});


Route::middleware('blockIP')->group(function () {
    Route::post('callback', [TripayCallbackController::class, 'handle']);
});