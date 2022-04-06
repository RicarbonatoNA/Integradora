<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gas extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='gas';
    public $timestamp=true;
    protected $fillable=['id','value','feed_id'];
}
