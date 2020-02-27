@extends('layouts.app')

@section('content')
<div class="margem">
    <div class="container">
        <div class="row justify-content-center mt-10">
            <div class="col-lg-6 m-5">

                <div class="row mb-5">
                    <div class="col-md-12">
                        @if(isset($result)) 
                            @if($result) 
                                <h3>Produto cadastrado com sucesso!</h3>
                                <a class="btn btn-primary" href="/produtos/cadastrar">Voltar</a>
                            @else
                                <h3>Não foi possível cadastrar o produto.</h3>
                                <a class="btn btn-primary" href="/produtos/cadastrar">Voltar</a>
                            @endif
                        @endif
                    </div>
                </div>

                <h3 class="mt-10">Cadastro de Produto</h3>

                <form action="/produtos/cadastrar" method="POST" class="card p-4">
                @csrf      
                    
                    <div class="form-group">
                        <label for="produto">Produto</label>
                        <input name="produto" type="text" class="form-control" id="produto" placeholder="Digite o nome do produto" value="{{ old('produto') }}" required> 
                    </div>

                    <div class="form-group">
                        <label for="cod_interno">Código Interno</label>
                        <input name="cod_interno" type="text" class="form-control" id="cod_interno" placeholder="Digite o Código Interno" value="{{ old('cod_interno') }}" required> 
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10" value="{{ old('descricao') }}" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="data_criacao">Data de Criação</label>
                        <input name="data_criacao" type="text" class="form-control" id="data_criacao" placeholder="Digite a Data de Criação" value="{{ old('data_criacao') }}" required> 
                    </div>

                    <div class="form-group">
                        <label for="inativo">Inativo</label>
                        <select class="form-control" name="inativo" id="inativo">
                        <option value="{{ old('inativo') }}" selected></option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cod_integracao">Código Integração</label>
                        <input name="cod_integracao" type="text" class="form-control" id="cod_integracao" placeholder="Digite o Código Integração" value="{{ old('cod_integracao') }}" required> 
                    </div>
                    
                    <div class="form-group">
                        <label for="qde_embalagem">Quantidade por Embalagem</label>
                        <input name="qde_embalagem" type="number" class="form-control" id="qde_embalagem" placeholder="Digite a quantidade por embalagem" value="{{ old('qde_embalagem') }}" required> 
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor (R$)</label>
                        <input name="valor" type="number" class="form-control" id="valor" placeholder="Digite o Valor" value="{{ old('valor') }}" required> 
                    </div>

                    <div class="col-lg p-0">
                       <button type="submit" class="btn btn-primary">Cadastrar</button> 
                    </div>
                    
                </form>
               
            </div>    
        </div> 
    </div>
</div>
@endsection