<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CarController;
use App\Http\Resources\UserResource;
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
    $res = new UserResource($request->user());
    return response()->json([
        'message'=>'Getuser Susscess!',
        'data'=>$res->toNewArray()
        // 'data'=> $request->user(),
    ]);
});
Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);
Route::post('/forgotpassword',[AuthController::class, 'forgotpassword']);
Route::middleware('auth:sanctum')->post('/logout',[AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/changepassword',[AuthController::class, 'changepassword']);
Route::resource('/car',CarController::class);
// Route::post('/post',[CardController::class, 'create']);  