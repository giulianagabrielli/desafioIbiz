@extends('layouts.app')

@section('content')
<div class="margem">
<section class="container">
    <div class="row">
        <div class="col-md-12 mb-5">
            <a href="/produtos/cadastrar" class="btn btn-success btn-lg">Cadastrar Produto</a>
        </div>

        <div class="col-md-12 mb-4">
            <h3>Lista de produtos:</h3>
            <a href="/produtos/ativos" class="btn btn-outline-secondary">Ativos</a>
            <a href="/produtos/inativos" class="btn btn-primary">Inativos</a>
        </div>

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Código Interno</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Código Integração</th>
                        <th scope="col">Qde por Embalagem</th>
                        <th scope="col">Valor por Embalagem</th>
                        <th scope="col">Criado</th>
                        <th scope="col">Atualizado</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <th scope="row"> {{ $product->nome }} </th>
                        <td> {{ $product->cod_interno }} </td>
                        <td> {{ $product->descricao }} </td>
                        <td> {{ $product->cod_integracao }} </td>
                        <td> {{ $product->qde_embalagem }} </td>
                        <td> R$ {{ $product->valor_embalagem }} </td>
                        <td> {{ $product->created_at }} </td>
                        <td> {{ $product->updated_at }} </td>
                        <td>
                            <a class="btn btn-success" href="/produtos/atualizar/{{$product->id}}">Atualizar</a>
                            <a class="btn btn-danger" href="/produtos/deletar/{{$product->id}}">Deletar</a>
                        </td>
                    </tr>
                @empty
                    <h1>Não há produtos inativos cadastrados</h1>
                @endforelse   
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>

@endsection