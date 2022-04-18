<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CasaCont extends Controller
{
        //crea un Sensor
        public function CrearSensor($hab,$nombre){//returna objeto
            $nomFeed=self::feedId($nombre);
            $nomHab=self::feedId($hab);
            $url="https://io.adafruit.com/api/v2/juliomena1806/groups/".$nomHab."/feeds";
            $response=Http::post($url, 
            [
                'X-AIO-Key'=>env('ADAFRUIT_KEY'),
                'name'=>$nomFeed
            ]);
            return $response->object();
        }
        //para modificar una casa
        public function ModificarCasa($nombre,$nuevoNombre){
            $nomFeed=self::feedId($nombre);
            $nomMod=self::feedId($nuevoNombre);
            $url="https://io.adafruit.com/api/v2/juliomena1806/groups/".$nomFeed;
            $response=Http::put($url, 
            [
                'X-AIO-Key'=>env('ADAFRUIT_KEY'),
                'name'=>$nomMod,
                'key'=>$nomMod
            ]);
            return $response->object();
        }
        //para eliminar una casa
        public function EliminarCasa($nombre){
            $nomFeed=self::feedId($nombre);
            $url="https://io.adafruit.com/api/v2/juliomena1806/groups/".$nomFeed;
            $response=Http::delete($url, 
            [
                'X-AIO-Key'=>env('ADAFRUIT_KEY')
            ]);
            return $response->object();
        }
        //para eliminar un sensor
        //NO
         //public function EliminarSensor($hab,$nombre){
           // $nomHab=self::feedId($hab);
            //$nomFeed=self::feedId($nombre);
            //$url="https://io.adafruit.com/api/v2/juliomena1806/feeds/".$nomHab.".".$nomFeed;
            //$response=Http::delete($url, 
            //[
              //  'X-AIO-Key'=>env('ADAFRUIT_KEY'),
            //]);
          //  return $response->object();
        //} 
        //modifica el nombre del sensor, hay que modificar tambien la key, de lo cotrario las consultas no se podran hacer
        //En prueba
        public function ModificarSensor($hab,$nombre,$nuevoNombre){
            $nomHab=self::feedId($hab);
            $nomFeed=self::feedId($nombre);
            $nomMod=self::feedId($nuevoNombre);
            $url="https://io.adafruit.com/api/v2/juliomena1806/feeds/".$nomHab.".".$nomFeed;
            $response=Http::put($url, 
            [
                'X-AIO-Key'=>env('ADAFRUIT_KEY'),
                'name'=>$nomMod,
                'key'=>$nomMod,
            ]);
            return $response->object();
        }
        //total de sensores en la casa
        public function MostrarCasas(){//devuelve un arreglo
            $url="http://io.adafruit.com/api/v2/juliomena1806/groups";
            $response=Http::get($url, 
            [
                'X-AIO-Key'=>env('ADAFRUIT_KEY')
            ]);
            return $response->object();
        }
        //total de sensores en una habitacion
        public function ListarSensores($hab){//devuelve un arreglo
            $nomHab=self::feedId($hab);
            $url="http://io.adafruit.com/api/v2/juliomena1806/groups/".$nomHab."/feeds";
            $response=Http::get($url, 
            [
                'X-AIO-Key'=>env('ADAFRUIT_KEY')
            ]);
            return $response->object();
        }
        //añade sensor a una casa
        public function AñadirSensor($hab,$nombreSensor){//retorna objeto
            $nomHab=self::feedId($hab);
            $nomFeed=self::feedId($nombreSensor);
            $url="https://io.adafruit.com/api/v2/juliomena1806/groups/".$nomHab."/add";
            $response=Http::post($url,[
                'X-AIO-Key'=>env('ADAFRUIT_KEY'),
                'feed_key'=>$nomFeed
            ]);
            return $response->object();
        }
        //para quitar sensor de una habitacion, regresan a default
        public function CambiarSensor($hab,$nombreSensor){//retorna objeto
            $nomHab=self::feedId($hab);
            $nomFeed=self::feedId($nombreSensor);
            $url="https://io.adafruit.com/api/v2/juliomena1806/groups/".$nomHab."/remove";
            $response=Http::post($url,[
                'X-AIO-Key'=>env('ADAFRUIT_KEY'),
                'feed_key'=>$nomFeed
            ]);
            return $response->object();
        }

        //FUNCIONA
        public function AñadirCasa($nombre){
            $nomFeed=self::feedId($nombre);
            $url="https://io.adafruit.com/api/v2/juliomena1806/groups";
            $response=Http::post($url,[
                'X-AIO-Key'=>env('ADAFRUIT_KEY'),
                'name'=>$nomFeed
            ]);
            return $response->object();
        }
        public function feedId($nombre){
            $feed = strtolower($nombre);
            $searchString = " ";
            $replaceString = "";
            $originalString = $feed; 
     
            $feedKey = str_replace($searchString, $replaceString, $originalString);
            return $feedKey;
        }
}
