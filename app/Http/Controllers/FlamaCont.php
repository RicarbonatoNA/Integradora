<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Flama;

class FlamaCont extends Controller
{
    public function MostrarFlama(){ 
        
        $response = Http::withHeaders(['X-AIO-Key' => env('ADAFRUIT_KEY')])
        ->get('https://io.adafruit.com/api/v2/juliomena1806/feeds/flame/data/last');
        $value = $response['value'];
        $created_at = $response['created_at'];
        $updated_at = $response['updated_at'];
        $feed_id = $response['feed_id'];
        $registro = Flama::create([     
             'created_at' =>$created_at,
             'updated_at'=>$updated_at,
             'value' =>$value,
             'feed_id' =>$feed_id,
         ]);{
         }
         return $registro;
    } 

    public function MostrarRegistro(){
        $flama = Flama::all();
        return $flama;
    }
}
