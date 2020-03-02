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

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Fazendo a associação das tabelas para cruzar dados de users e roles.
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    // Fazendo a associação das tabelas para cruzar dados de users e status.
    public function status(){
        return $this->belongsTo('App\Status');
    }

    //se tem algum dos roles
    public function hasAnyRoles($roles){

        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }

        return false;
    }

    //se tem um dos roles
    public function hasRole($role){

        if($this->roles()->where('name', $role)->first()){
            return true;
        }

        return false;
    }
}
