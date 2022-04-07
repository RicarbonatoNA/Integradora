<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\humedad;

class HumedadCont extends Controller
{
    public function InsertarHumedad(){ 
        
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_HZJb40gw75BKFBuyv3nzLrPmtnNW'])
        ->get('https://io.adafruit.com/api/v2/juliomena1806/feeds/humendad/data/last');
        $value = $response['value'];
        $created_at = $response['created_at'];
        $updated_at = $response['updated_at'];
        $feed_id = $response['feed_id'];
        $registro = Humedad::create([     
             'created_at' =>$created_at,
             'updated_at'=>$updated_at,
             'value' =>$value,
             'feed_id' =>$feed_id,
         ]);{
         }
         return $registro;
    } 

    public function MostrarHumedad(){
        $humedad = Humedad::all();
        return $humedad;
    }
}
