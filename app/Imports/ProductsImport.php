<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([   
            'id'                     => $row[0],    
            'nome'                => $row[1],
            'cod_interno'            => $row[2], 
            'descricao'              => $row[3], 
            'status_id'              => $row[4], 
            'cod_integracao'         => $row[5], 
            'qde_embalagem'          => $row[6], 
            'valor_embalagem'        => $row[7], 
        ]);
    }
}
