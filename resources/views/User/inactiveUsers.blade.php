@extends('layouts.app')

@section('content')
<div class="margem">
<section class="container">
    <div class="row">

        @can('admin-role')
        <div class="col-md-12 mb-4">
            <a href="/usuarios/cadastrar" class="btn btn-success btn-lg">Cadastrar Novos Usuários</a>
        </div>
        @endcan

        <div class="col-md-12 mb-4">
            <h3>Lista de usuários:</h3>
            
            <a href="/usuarios/ativos" class="btn btn-outline-secondary">Ativos</a>
            @can('admin-role')
            <a href="/usuarios/inativos" class="btn btn-outline-secondary">Inativos</a>
            @endcan        </div>

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome do usuário</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Nível de Acesso</th>
                        <th scope="col">Criado em</th>
                        <th scope="col">Atualizado em</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row"> {{$user->id}} </th>
                        <td> {{$user->name}} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }} </td>
                        <td> {{ $user->created_at }} </td>
                        <td> {{ $user->updated_at }} </td>
                        <td>
                            <a class="btn btn-success" href="/usuarios/atualizar/{{$user->id}}">Atualizar</a>
                            <a class="btn btn-danger" href="/usuarios/deletar/{{$user->id}}">Deletar</a>
                        </td>
                    </tr>
                @empty
                    <h1>Não há usuários inativos cadastrados</h1>
                @endforelse   
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>

@endsection