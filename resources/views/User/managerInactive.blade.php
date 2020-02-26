@extends('layouts.app')

@section('content')
<div class="margem">
<section class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h3>Lista de usuários inativos:</h3>
            
            <a href="/usuarios/admin/inativos" class="btn btn-outline-secondary">Administrador</a>
            <a href="/usuarios/gerente/inativos" class="btn btn-success">Gerente</a>
            <a href="/usuarios/consultor/inativos" class="btn btn-outline-secondary">Consultor</a>
        </div>

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome do usuário</th>
                        <th scope="col">E-mail</th>
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
                        <td> {{ $user->created_at }} </td>
                        <td> {{ $user->updated_at }} </td>
                        <td>
                            <a class="btn btn-primary" href="/usuarios/atualizar/{{$user->id}}">Atualizar</a>
                            <a class="btn btn-danger" href="/usuarios/deletar/{{$user->id}}">Deletar</a>
                        </td>
                    </tr>
                @empty
                    <h1>Não há Gerentes Inativos cadastrados</h1>
                @endforelse   
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>

@endsection