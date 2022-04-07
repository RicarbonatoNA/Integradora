<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\humo;

class HumoCont extends Controller
{
    public function InsertarHumo(){ 
        
        $response = Http::withHeaders(['X-AIO-Key' => 'aio_HZJb40gw75BKFBuyv3nzLrPmtnNW'])
        ->get('https://io.adafruit.com/api/v2/juliomena1806/feeds/humendad/data/last');
        $value = $response['value'];
        $created_at = $response['created_at'];
        $updated_at = $response['updated_at'];
        $feed_id = $response['feed_id'];
        $registro = Humo::create([     
             'created_at' =>$created_at,
             'updated_at'=>$updated_at,
             'value' =>$value,
             'feed_id' =>$feed_id,
         ]);{
         }
         return $registro;
    } 

    public function MostrarHumo(){
        $humo = Humo::all();
        return $humo;
    }
}
