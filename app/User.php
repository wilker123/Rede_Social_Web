<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','usuario','password','data_nascimento','foto_perfil','biografia'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
/*Relacionamento 1 para 1
    public function posts(){
        return $this->hasOne(Post::class, 'usuario','id');
    }
*/
//Relacionamento de 1 para muitos
    public function posts(){
        return $this->hasMany(Post::class, 'usuario','id');
    }

}
