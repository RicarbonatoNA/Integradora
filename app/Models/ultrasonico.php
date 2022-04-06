<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ultrasonico extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='ultrasonico';
    public $timestamp=true;
    protected $fillable=['id','value','feed_id'];
}
