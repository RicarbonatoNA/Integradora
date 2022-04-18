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
use App\Http\Controllers\FlamaCont;
use App\Http\Controllers\CasaCont;

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
    Route::get('/Ver', [AuthController::class, 'Ver']);
    Route::delete('/Eliminar/{id}', [AuthController::class, 'Eliminar']);
    
    Route::group(['prefix' => 'movimiento'], function(){
        Route::get('/MostrarMovimiento',[MovimientoCont::class, 'InsertarMovimiento']);
        Route::get('/MostrarRegistro',[MovimientoCont::class, 'MostrarMovimiento']);
    });

    Route::group(['prefix' => 'temperatura'], function(){
        Route::get('/MostrarTemperatura',[TemperaturaCont::class, 'InsertarTemperatura']);
        Route::get('/MostrarRegistro',[TemperaturaCont::class, 'MostrarTemperatura']);
    });

    Route::group(['prefix' => 'humedad'], function(){
        Route::get('/MostrarHumedad',[HumedadCont::class, 'InsertarHumedad']);
        Route::get('/MostrarRegistro',[HumedadCont::class, 'MostrarHumedad']);
    });

    Route::group(['prefix' => 'distancia'], function(){
        Route::get('/MostrarDistancia',[UltrasonicoCont::class, 'MostrarDistancia']);
        Route::get('/MostrarRegistro',[UltrasonicoCont::class, 'MostrarRegistro']);
    });

    Route::group(['prefix' => 'gas'], function(){
        Route::get('/MostrarGas',[GasCont::class, 'InsertarGas']);
        Route::get('/MostrarRegistro',[GasCont::class, 'MostrarGas']);
    });

    //Route::group(['prefix' => 'humo'], function(){
      //  Route::get('/InsertarHumo',[HumoCont::class, 'InsertarHumo']);
        //Route::get('/MostrarHumo',[HumoCont::class, 'MostrarHumo']);
    //});

    Route::group(['prefix' => 'flama'], function(){
        Route::get('/MostrarFlama',[FlamaCont::class, 'InsertarFlama']);
        Route::get('/MostrarRegistro',[FlamaCont::class, 'MostrarFlama']);
    });

    Route::group(['prefix' => 'casa'], function(){
        Route::post('/AñadirCasa/{nombre}',[CasaCont::class, 'AñadirCasa']);
        Route::get('/MostrarCasas/{nombre}',[CasaCont::class, 'MostrarCasas']);
        Route::delete('/EliminarCasa/{nombre}',[CasaCont::class, 'EliminarCasa']);
        Route::put('/ModificarCasa/{nombre}/{nuevo_nombre}',[CasaCont::class, 'ModificarCasa']);
    });
    
    Route::group(['prefix' => 'sensor'], function(){
        Route::post('/CrearSensor/{nombre}/{nuevo_nombre}',[CasaCont::class, 'CrearSensor']);
        Route::post('/AñadirSensor/{nombre}/{nombre_sensor}',[CasaCont::class, 'AñadirSensor']);
        Route::post('/CambiarSensor/{nombre}/{nombre_sensor}',[CasaCont::class, 'CambiarSensor']);
        Route::get('/MostrarSensores/{nombre}',[CasaCont::class, 'ListarSensores']);
        Route::put('/ModificarSensor/{nombre}/{nombre_sensor}/{nuevo_nombre}',[CasaCont::class, 'ModificarSensor']);

    });
});
//Route::delete('/EliminarSensor/{nombre}/{nombre_sensor}',[CasaCont::class, 'EliminarSensor']);

