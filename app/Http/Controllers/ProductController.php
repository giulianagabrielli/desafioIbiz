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

    //edição de produtos
    public function updateProduct(Request $request, $id=0){
            
        if($request->isMethod('GET')){
           
            $product = Product::find($id);
            
            if($product){
                return view('Product.updateProduct', ["product"=>$product]);
            } else {
                return view('Product.updateProduct');
            }
        } else {
            
            //alterando dados na tabela Products:
            $product = Product::find($request->id); 
            $product->produto = $request->produto;
            $product->cod_interno = $request->cod_interno;
            $product->descricao = $request->descricao;
            $product->inativo = $request->inativo;
            $product->cod_integracao = $request->cod_integracao;
            $product->qde_embalagem = $request->qde_embalagem;
            $product->valor = $request->valor;
            
            
            $result = $product->save();
    
            return view('Product.updateProduct', ["result"=>$result]);
        }
    }

    //deleção de produtos
    public function deleteProduct(Request $request, $id=0){
        $result = Product::destroy($id);
        if($result){
            return redirect('/produtos/ativos'); 
        }
    } 

    //cadastro de novos produtos
    public function createProduct(Request $request){

        if($request->isMethod('GET')){
            
            return view('Product.registerProduct');

        } else {

            //criando novo produto em Products:
            $product = new Product();
            $product->produto = $request->produto; 
            $product->cod_interno = $request->cod_interno; 
            $product->descricao = $request->descricao; 
            $product->data_criacao = $request->data_criacao; 
            $product->inativo = $request->inativo; 
            $product->cod_integracao = $request->cod_integracao; 
            $product->qde_embalagem = $request->qde_embalagem; 
            $product->valor = $request->valor; 

            $result = $product->save();

            //enviando result para a view:
            return view('Product.registerProduct', ["result"=>$result]); 
        }
    }

}
