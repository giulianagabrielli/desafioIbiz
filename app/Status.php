<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id';
    protected $fillable = [
        'status',
        'created_at',
        'updated_at'        
    ];
}
