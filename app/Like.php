<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    public $fillable = [
        'user_id','id_post','like'
    ];

     public function post(){
        return $this->hasMany(Post::class, 'id_post', 'id');
    }

    public function coments(){
        return $this->hasMany(comentario::class, 'post','id');
    }

}
