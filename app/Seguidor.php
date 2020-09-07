<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model
{
     protected $fillable = [
        'id_seguidor','id_seguido'
    ];
}
