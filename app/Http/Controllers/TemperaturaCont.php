<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\temperatura;

class TemperaturaCont extends Controller
{
    public function InsertarTemperatura(){ 
        
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_pysh81IeYVTz86xN2MrmQgrTqWEp'])
        ->get('https://io.adafruit.com/api/v2/juliomena1806/feeds/temperatura1/data/last');
        $value = $response['value'];
        $created_at = $response['created_at'];
        $updated_at = $response['updated_at'];
        $feed_id = $response['feed_id'];
        $registro = Temperatura::create([     
             'created_at' =>$created_at,
             'updated_at'=>$updated_at,
             'value' =>$value,
             'feed_id' =>$feed_id,
         ]);{
         }
         return $registro;
    } 

    public function MostrarTemperatura(){
        $temperatura = Temperatura::all();
        return $temperatura;
    }
}
