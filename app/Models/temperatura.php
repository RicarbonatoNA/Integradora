<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temperatura extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='temperatura';
    public $timestamp=true;
    protected $fillable=['id','value','feed_id'];
}
