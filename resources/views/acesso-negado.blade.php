@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Acesso negado</div>

                    <div class="card-body">
                            <div class="alert alert-danger" role="alert">
                                Desculpe. Você não possui acesso a essa tarefa.
                            </div>

                        Voltar para a <a href="{{ route('tarefa.index') }}">home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
