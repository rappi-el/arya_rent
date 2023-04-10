<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ApicheckoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [ApiAuthController::class, 'login']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/refresh', [ApiAuthController::class, 'refresh']);
});


Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::get('/search', [ApiProductController::class, 'index']);
    Route::get('{id}/details', [ApiProductController::class, 'details']);


    Route::get('paymethod', [ApicheckoutController::class, 'select_payment']);
    Route::post('{id}/post_checkout', [ApicheckoutController::class, 'store']);

    Route::get('transaction', [ApicheckoutController::class, 'transaction']);

    Route::get('transaction/{id}', [ApicheckoutController::class, 'details_transaction']);

});