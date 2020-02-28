@extends('layouts.app')

@section('content')
<div class="margem">
    <div class="container">
        <div class="row justify-content-center mt-10">
            <div class="col-lg-6 m-5">

                @if(isset($product)) 
                <h3 class="mt-10">Atualização de dados de Produto</h3>
                <form action="/produtos/atualizar" method="POST" class="card p-4">
                @csrf      
                    <!-- input hidden com o id -->
                    <input type="text" name="id" hidden value="{{ $product->id }}"> 

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" value="{{ $product->nome }}"> 
                    </div>

                    <div class="form-group">
                        <label for="cod_interno">Código Interno</label>
                        <input name="cod_interno" type="text" class="form-control" id="cod_interno" value="{{ $product->cod_interno }}"> 
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10">{{ $product->descricao }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status_id">Status Id</label>
                        <select class="form-control" name="status_id" id="status_id">
                        <option selected>{{ $product->status_id }}</option>
                        <option value=1>1 - Ativo</option>
                        <option value=2>2 - Inativo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cod_integracao">Código Integração</label>
                        <input name="cod_integracao" type="text" class="form-control" id="cod_integracao" value="{{ $product->cod_integracao }}"> 
                    </div>
                    
                    <div class="form-group">
                        <label for="qde_embalagem">Quantidade por Embalagem</label>
                        <input name="qde_embalagem" type="number" class="form-control" id="qde_embalagem" value="{{ $product->qde_embalagem }}"> 
                    </div>

                    <div class="form-group">
                        <label for="valor_embalagem">Valor por Embalagem</label>
                        <input name="valor_embalagem" type="number" class="form-control" id="valor_embalagem" value="{{ $product->valor_embalagem }}"> 
                    </div>

                    <div class="col-lg p-0">
                       <button type="submit" class="btn btn-primary">Atualizar</button> 
                    </div>
                    
                </form>
                @elseif(isset($result))

                @else
                    <h3>O produto não existe ou Código Interno incorreto.</h3>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        @if(isset($result)) 
                            @if($result) 
                                <h3>Atualização realizada com sucesso!</h3>
                                <a class="btn btn-primary" href="/produtos/ativos">Voltar</a>
                            @else
                                <h3>Não deu certo!</h3>
                                <a href="/produtos/atualizar/{cod_interno?}"></a>
                            @endif
                        @endif

                    </div>
                </div>



            </div>    
        </div> 
    </div>
</div>
@endsection