<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class humo extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='humo';
    public $timestamp=true;
    protected $fillable=['id','value','feed_id'];
}
