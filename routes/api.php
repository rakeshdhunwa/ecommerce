<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Models\User;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens/create', function (Request $request){

    $user = User::where('id', $request->input('id'))->first();
    if($user) {
        $token = $user->createToken('auth:sanctum');
        return ['token' => $token];
    }
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function(){
    Route::resource('user', UserController::class);

    


});