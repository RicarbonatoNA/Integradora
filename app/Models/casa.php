<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casa extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='casa';
    public $timestamp=true;
    protected $fillable=['id','user_id'];
}
