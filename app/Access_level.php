<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access_level extends Model
{
    protected $table = 'access_levels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'access_level',        
    ];
}
