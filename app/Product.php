<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'produto',
        'cod_interno', 
        'descricao', 
        'data_criacao', 
        'inativo', 
        'cod_integracao', 
        'qde_embalagem', 
        'valor',
        'created_at',
        'updated_at'        
    ];
}
