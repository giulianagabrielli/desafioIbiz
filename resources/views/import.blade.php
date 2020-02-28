@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Importar e exportar planilha de Produtos no Banco De Dados
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Importar Produtos</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Exportar Produtos</a>
            </form>
        </div>
    </div>
</div>
@endsection