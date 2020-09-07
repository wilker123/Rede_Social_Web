<?php

namespace App;

use App\Like;
use App\comentario;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   // public function user(){
     //   return $this->belongTo(User::class, 'usuario', 'id');
    //}
    public $fillable = [
        'usuario','postagem','titulo','perfil','nome_usuario',
    ];

    public function likes(){
        return $this->hasMany(Like::class, 'id_post', 'id');
    }

    public function coments(){
        return $this->hasMany(comentario::class, 'post','id');
    }
}
