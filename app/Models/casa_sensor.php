<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casa_sensor extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='casa_sensor';
    public $timestamp=true;
    protected $fillable=['id','casa_id', 'temperatura_id', 'humedad_id', 'ultrasonico_id', 'movimiento_id', 'humo_id', 'gas_id'];
}
