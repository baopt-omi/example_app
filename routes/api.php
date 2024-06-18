<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Route::get('/callback', function(Request $request) {
//
//    $http = new GuzzleHttp\Client;
//
//    $response = $http->post('http://127.0.0.1:8000/oauth/access_token', [
//        'form_params' => [
//            'grant_type' => 'password',
//            'client_id' => 2,
//            'client_secret' => '81yGDQMIknB8EojClger5u7wa6HEcyrFo0Z9sAIV',
//            'username' => 'test@gmail.com',
//            'password' => '123',
//            'scope' => ''
//        ]
//
//    ]);
////    return 'Authenticate';
//    return json_decode((string) $response->getBody(), true);
//});

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::get('/user', [UserController::class, 'getUser']);

Route::get('/issue', [\App\Http\Controllers\IssueController::class, 'getIssue']);
Route::get('/sinc', [App\Http\Controllers\IssueController::class, 'sinc']);
