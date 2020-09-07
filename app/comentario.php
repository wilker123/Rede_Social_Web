<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    public $fillable = [
        'comentario','perfil','nomeUsuario','post'
    ];
}
