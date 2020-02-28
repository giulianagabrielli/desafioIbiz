@extends('layouts.app')

@section('content')
<div class="margem">
<section class="container">
    <div class="row">

        <div class="col-md-12 mb-4">
            <a href="/usuarios/cadastrar" class="btn btn-success btn-lg">Cadastrar Usuários</a>
            <small id="" class="form-text text-muted">Acesso restrito a administradores</small>
        </div>

        <div class="col-md-12 mb-4">
            <h3>Lista de usuários:</h3>
            
            <a href="/usuarios/ativos" class="btn btn-outline-secondary">Ativos</a>
            <a href="/usuarios/inativos" class="btn btn-primary">Inativos</a>
            <a href="/usuarios/admin/ativos" class="btn btn-outline-secondary">Usuários ativos por nível de acesso</a>
            <a href="/usuarios/admin/inativos" class="btn btn-outline-secondary">Usuários inativos por nível de acesso</a>
        </div>

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
                        <td> {{ $user->access_level }} </td>
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