<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'Produto',
        'Código Interno', 
        'Descrição', 
        'Data de Criação', 
        'Inativo?', 
        'Código Integração', 
        'Quantidade p/ Embalagem', 
        'Valor',
        'created_at',
        'updated_at'        
    ];
}
