<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //visualização de produtos ativos 
    public function getActiveProducts(){
        
        $products = Product::where('inativo', '=', 'Não')->get();
        return view('Product.activeProducts', ["products"=>$products]);
    }

    //visualização de produtos inativos 
    public function getInactiveProducts(){
        
        $products = Product::where('inativo', '=', 'Sim')->get();
        return view('Product.inactiveProducts', ["products"=>$products]);
    }
}
