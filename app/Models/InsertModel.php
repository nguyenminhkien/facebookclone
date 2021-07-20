<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;


class InsertModel extends Model
{
    
    protected $table='images';  
    public $timestamps = true;
}