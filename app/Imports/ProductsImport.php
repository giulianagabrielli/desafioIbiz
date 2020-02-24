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
            'Produto'                   => $row[0],
            'Código Interno'            => $row[1], 
            'Descrição'                 => $row[2], 
            'Data de Criação'           => $row[3], 
            'Inativo?'                  => $row[4], 
            'Código Integração'         => $row[5], 
            'Quantidade p/ Embalagem'   => $row[6], 
            'Valor'                     => $row[7], 
        ]);
    }
}
