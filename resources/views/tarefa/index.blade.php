@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tarefas <a href="{{ route('tarefa.create') }}" class="float-right">Novo</a></div>

                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data Limite</th>
                                <th scope="col">Criado em</th>
                                <th scope="col">Atualizado em</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Remover</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tarefas as $key => $t)
                                <tr>
                                    <th scope="row">{{ $t['id'] }}</th>
                                    <td>{{ $t['tarefa'] }}</td>
                                    <td>{{ date('d/m/y', strtotime($t['data_limite_conclusao'])) }}</td>
                                    <td>{{ date('d/m/y', strtotime($t['created_at'])) }}</td>
                                    <td>{{ date('d/m/y', strtotime($t['updated_at'])) }}</td>
                                    <td><a href="{{ route('tarefa.edit', $t['id']) }}">Editar</a></td>
                                    <td>
                                        <form action="{{ route('tarefa.destroy', ['tarefa' => $t['id']]) }}" method="post" id="form_{{ $t['id'] }}">
                                            @method("DELETE")
                                            @csrf
                                            <a href="#" onclick="document.getElementById('form_{{ $t['id'] }}').submit()">Remover</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--                        {{ $tarefas->links() }} laravel 8 e bootstrap 4 incopativel--}}
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrL() }}">Voltar</a></li>

                                @for($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
