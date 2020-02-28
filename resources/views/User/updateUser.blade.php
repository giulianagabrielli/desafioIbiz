@extends('layouts.app')

@section('content')
<div class="margem">
    <div class="container">
        <div class="row justify-content-center mt-10">
            <div class="col-lg-6 m-5">

                @if(isset($user)) 
                <h3 class="mt-10">Atualização de dados de usuário</h3>
                <form action="/usuarios/atualizar" method="POST" class="card p-4">
                @csrf      
                    <!-- input hidden com o id -->
                    <input type="text" name="id" hidden value="{{ $user->id }}"> 

                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}"> 
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input name="password" type="password" class="form-control" id="password" value="{{ $user->password }}">
                    </div>

                    <div class="form-group">
                        <label for="access_level_id">Nível de Acesso</label>
                        <select class="form-control" name="access_level_id">
                        <option selected>{{ $user->access_level_id }}</option>
                        <option value="1">1 - Administrador</option>
                        <option value="2">2 - Gerente</option>
                        <option value="3">3 - Consultor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status_id">Status</label>
                        <select class="form-control" name="status_id">
                        <option selected>{{ $user->status_id }}</option>
                        <option value="1">1 - Ativo</option>
                        <option value="2">2 - Inativo</option>
                        </select>
                    </div>

                    <div class="col-lg p-0">
                       <button type="submit" class="btn btn-primary">Atualizar</button> 
                    </div>
                    
                </form>
                @elseif(isset($result))

                @else
                    <h3>O usuário não existe ou id incorreto.</h3>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        @if(isset($result)) 
                            @if($result) 
                                <h3>Atualização realizada com sucesso!</h3>
                                <a class="btn btn-primary" href="/usuarios/ativos">Voltar</a>
                            @else
                                <h3>Não deu certo!</h3>
                                <a href="/usuarios/atualizar/{id?}"></a>
                            @endif
                        @endif

                    </div>
                </div>



            </div>    
        </div> 
    </div>
</div>
@endsection