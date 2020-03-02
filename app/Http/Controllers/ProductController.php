<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gate;

class ProductController extends Controller
{

    //
    public function __construct(){
        $this->middleware('auth');
    }

    //visualização de produtos ativos 
    public function getActiveProducts(){
        
        $products = Product::where('status_id', '=', 1)->get();
        return view('Product.activeProducts', ["products"=>$products]);
    }

    //visualização de produtos inativos 
    public function getInactiveProducts(){
        
        if(Gate::denies('admin-manager-roles')){
            return redirect('/produtos/ativos');
        } else {
            $products = Product::where('status_id', '=', 2)->get();
            return view('Product.inactiveProducts', ["products"=>$products]);
        }

    }

    //edição de produtos por admin e gerente
    public function updateProduct(Request $request, $id=0){
            
        if($request->isMethod('GET')){

            if(Gate::denies('admin-manager-roles')){
                return redirect("/produtos/ativos");
            } else {

                $product = Product::find($id);
                return view('Product.updateProduct', ["product"=>$product]);
            }
           
        } else {
            
            //alterando dados na tabela Products:
            $product = Product::find($request->id); 
            $product->nome = $request->nome;
            $product->cod_interno = $request->cod_interno;
            $product->descricao = $request->descricao;
            $product->status_id = $request->status_id;
            $product->cod_integracao = $request->cod_integracao;
            $product->qde_embalagem = $request->qde_embalagem;
            $product->valor_embalagem = $request->valor_embalagem;
            
            $result = $product->save();
    
            return view('Product.updateProduct', ["result"=>$result]);
        }
    }

    //deleção de produtos por admin
    public function deleteProduct(Request $request, $id=0){

        if(Gate::denies('admin-role')){
            return redirect('/produtos/ativos'); 

        } else {
            $result = Product::destroy($id);
            return redirect('/produtos/ativos'); 
        }
    } 

    //cadastro de novos produtos admin e gerente
    public function createProduct(Request $request){

        if($request->isMethod('GET')){

            if(Gate::denies('admin-manager-roles')){
                return redirect('/produtos/ativos'); 
            } else {
                return view('Product.registerProduct');
            }
            
        } else {

            //criando novo produto em Products:
            $product = new Product();
            $product->nome = $request->nome; 
            $product->cod_interno = $request->cod_interno; 
            $product->descricao = $request->descricao; 
            $product->status_id = $request->status_id; 
            $product->cod_integracao = $request->cod_integracao; 
            $product->qde_embalagem = $request->qde_embalagem; 
            $product->valor_embalagem = $request->valor_embalagem; 

            $result = $product->save();

            //enviando result para a view:
            return view('Product.registerProduct', ["result"=>$result]); 
        }
    }

}
