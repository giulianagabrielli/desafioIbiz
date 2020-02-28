@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Seu usuário não possui nível de acesso!
                </div>
                <div>
                    <a class="btn btn-primary m-3" href="/">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
