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
            'produto'                => $row[0],
            'cod_interno'            => $row[1], 
            'descricao'              => $row[2], 
            'data_criacao'           => $row[3], 
            'inativo'                => $row[4], 
            'cod_integracao'         => $row[5], 
            'qde_embalagem'          => $row[6], 
            'valor'                  => $row[7], 
        ]);
    }
}
