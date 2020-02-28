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
        'name', 
        'email', 
        'password', 
        'cpf',
        'access_level_id', 
        'status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Fazendo a associação das tabelas para cruzar dados de users e access_levels.
    public function access_levels(){
        return $this->belongsTo('App\Access_level');
    }

    // Fazendo a associação das tabelas para cruzar dados de users e status.
    public function status(){
        return $this->belongsTo('App\Status');
    }
}
