<?php
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\GetUserId;
use App\Http\Middleware\Driver;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/getRole', function () {
        $userId = auth()->user();
        dd($userId);
        return $userId;



    });
    Route::get('/getRole', [TestController::class, 'getRole']);
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getDate/{id}', [TestController::class, 'getDate']);*/

 