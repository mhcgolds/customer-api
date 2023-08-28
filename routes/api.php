<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\CustomerContactsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

// Auth
//Route::post('/auth/login', [AuthController::class, 'login']);

Route::options('{any}', function () {
    return response('OK', \Illuminate\Http\Response::HTTP_NO_CONTENT)
          ->header('Access-Control-Allow-Origin', implode(',', config('cors.default_profile.allow_origins')))
          ->header('Access-Control-Allow-Methods', implode(',', config('cors.default_profile.allow_methods')))
          ->header('Access-Control-Allow-Headers', implode(',', config('cors.default_profile.allow_headers')));
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'token_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->token_name)->plainTextToken;
});

// Customer
//Route::middleware('auth:sanctum')->controller(CustomerController::class)->group(function () {
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/list', 'list');
    Route::get('/customer/show/{id}', 'show');
    Route::post('/customer/store', 'store');
    Route::put('/customer/update/{id}', 'update');
    Route::delete('/customer/destroy/{id}', 'destroy');
});

// CustomerContacts
Route::middleware('auth:sanctum')->controller(CustomerContactsController::class)->group(function () {
    Route::get('/customer-contacts/list/{id}', 'list');
    Route::get('/customer-contacts/show/{id}', 'show');
    Route::post('/customer-contacts/store', 'store');
    Route::put('/customer-contacts/update/{id}', 'update');
    Route::delete('/customer-contacts/destroy/{id}', 'destroy');
});