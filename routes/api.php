<?php

use App\Http\Controllers\ClientController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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
Route::post('/user/token', function (Request $request) {

    if($request->email === '' OR $request->email == null)
    {
        $response['email'][0] = 'Email is required';
        return response()->json($response, 503);
    }

    if($request->password === '' OR $request->password == null)
    {
        $response['password'][0] = 'Password is required';
        return response()->json($response, 503);
    }

    if($request->device_name === '' OR $request->device_name == null)
    {
        $response['device'][0] = 'Device is required';
        return response()->json($response, 503);
    }

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        $response['credentials'][0] = 'The provided credentials are incorrect.';
        return response()->json($response, 503);
    }

    $response['token'][0] = $user->createToken($request->device_name)->accessToken;
    return response()->json($response, 200);
});

Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->middleware('ValidateToken');
Route::get('/client/{id}', [App\Http\Controllers\ClientController::class, 'show'])->middleware('ValidateToken');
