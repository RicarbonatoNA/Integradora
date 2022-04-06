<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovimientoCont;
use App\Http\Controllers\TemperaturaCont;
use App\Http\Controllers\HumedadCont;
use App\Http\Controllers\UltrasonicoCont;
use App\Http\Controllers\GasCont;
use App\Http\Controllers\HumoCont;

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
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    
    Route::group(['prefix' => 'movimiento'], function(){
        Route::get('/InsertarMovimiento',[MovimientoCont::class, 'InsertarMovimiento']);
        Route::get('/MostrarMovimiento',[MovimientoCont::class, 'MostrarMovimiento']);
    });

    Route::group(['prefix' => 'temperatura'], function(){
        Route::get('/InsertarTemperatura',[TemperaturaCont::class, 'InsertarTemperatura']);
        Route::get('/MostrarTemperatura',[TemperaturaCont::class, 'MostrarTemperatura']);
    });

    Route::group(['prefix' => 'humedad'], function(){
        Route::get('/InsertarHumedad',[HumedadCont::class, 'InsertarHumedad']);
        Route::get('/MostrarHumedad',[HumedadCont::class, 'MostrarHumedad']);
    });

    Route::group(['prefix' => 'distancia'], function(){
        Route::get('/InsertarDistancia',[UltrasonicoCont::class, 'InsertarDistancia']);
        Route::get('/MostrarDistancia',[UltrasonicoCont::class, 'MostrarDistancia']);
    });

    Route::group(['prefix' => 'gas'], function(){
        Route::get('/InsertarGas',[GasCont::class, 'InsertarGas']);
        Route::get('/MostrarGas',[GasCont::class, 'MostrarGas']);
    });

    Route::group(['prefix' => 'humo'], function(){
        Route::get('/InsertarHumo',[HumoCont::class, 'InsertarHumo']);
        Route::get('/MostrarHumo',[HumoCont::class, 'MostrarHumo']);
    });
});

