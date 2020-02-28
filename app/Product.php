<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'nome',
        'cod_interno', 
        'descricao', 
        'status_id', 
        'cod_integracao', 
        'qde_embalagem', 
        'valor_embalagem',
        'created_at',
        'updated_at'        
    ];

    // Fazendo a associação das tabelas para cruzar dados de produtos e status.
    public function status(){
        return $this->belongsTo('App\Status');
    }
}
