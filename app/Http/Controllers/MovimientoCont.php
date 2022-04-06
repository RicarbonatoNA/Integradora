<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\movimiento;


class MovimientoCont extends Controller
{
    public function InsertarMovimiento(){ 
        
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_pysh81IeYVTz86xN2MrmQgrTqWEp'])
        ->get('https://io.adafruit.com/api/v2/juliomena1806/feeds/movimiento/data/last');
        $value = $response['value'];
        $created_at = $response['created_at'];
        $updated_at = $response['updated_at'];
        $feed_id = $response['feed_id'];
        $registro = Movimiento::create([     
             'created_at' =>$created_at,
             'updated_at'=>$updated_at,
             'value' =>$value,
             'feed_id' =>$feed_id,
         ]);{
         }
         return $registro;
    } 

    public function MostrarMovimiento(){
        $movimiento = Movimiento::all();
        return $movimiento;
    }
}
