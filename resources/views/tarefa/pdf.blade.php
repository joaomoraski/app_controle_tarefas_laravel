<!doctype html>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            *{
                box-sizing: border-box;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
            }
            body{
                font-family: Helvetica;
                -webkit-font-smoothing: antialiased;
                background: rgba( 71, 147, 227, 1);
            }
            h2{
                text-align: center;
                font-size: 18px;
                text-transform: uppercase;
                letter-spacing: 1px;
                color: white;
                padding: 30px 0;
            }

            /* Table Styles */

            .table-wrapper{
                margin: 10px 70px 70px;
                box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
            }

            .fl-table {
                border-radius: 5px;
                font-size: 12px;
                font-weight: normal;
                border: none;
                border-collapse: collapse;
                width: 100%;
                max-width: 100%;
                white-space: nowrap;
                background-color: white;
            }

            .fl-table td, .fl-table th {
                text-align: center;
                padding: 8px;
            }

            .fl-table td {
                border-right: 1px solid #f8f8f8;
                font-size: 12px;
            }

            .fl-table thead th {
                color: #ffffff;
                background: #4FC3A1;
            }


            .fl-table thead th:nth-child(odd) {
                color: #ffffff;
                background: #324960;
            }

            .fl-table tr:nth-child(even) {
                background: #F8F8F8;
            }

        </style>
{{--        <style>--}}
{{--            .page-break {--}}
{{--                page-break-after: always;--}}
{{--            }--}}
{{--            .titulo {--}}
{{--                border:1px;--}}
{{--                background-color: #c2c2c2;--}}
{{--                text-align: center;--}}
{{--                width: 100%;--}}
{{--                text-transform: uppercase;--}}
{{--                font-weight: bold;--}}
{{--                margin-bottom: 25px;--}}
{{--            }--}}

{{--            table th{--}}
{{--                text-align: left;--}}
{{--            }--}}
{{--            table, th, td {--}}
{{--                border: 1px solid black;--}}
{{--                border-collapse: collapse;--}}
{{--            }--}}

{{--            .gray{--}}
{{--                background-color: gray;--}}
{{--            }--}}

{{--        </style>--}}
        <title>Lista de Tarefas</title>
    </head>
    <body>
        <div class="titulo">Lista de Tarefas</div>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                    <tr>
                        <th>ID da Tarefa</th>
                        <th>Dono da Tarefa</th>
                        <th>Tarefa</th>
                        <th>Data Limite Conclusão</th>
                        <th>Data criação</th>
                        <th>Data atualização</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tarefas as $key => $tarefa)
                        <tr>
                            <td>{{ $tarefa->id }}</td>
                            <td>{{ $tarefa->user->name }}</td>
                            <td>{{ $tarefa->tarefa }}</td>
                            <td>{{ date('d/m/y H:i:s', strtotime($tarefa->data_limite_conclusao)) }}</td>
                            <td>{{ date('d/m/y H:i:s', strtotime($tarefa->created_at)) }}</td>
                            <td>{{ date('d/m/y H:i:s', strtotime($tarefa->updated_at)) }}</td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    {{--        <table style="width: 100%">--}}
    {{--            <thead>--}}
    {{--            <tr class="gray">--}}
    {{--                <th>ID da Tarefa</th>--}}
    {{--                <th>Dono da Tarefa</th>--}}
    {{--                <th>Tarefa</th>--}}
    {{--                <th>Data Limite Conclusão</th>--}}
    {{--                <th>Data criação</th>--}}
    {{--                <th>Data atualização</th>--}}
    {{--            </tr>--}}
    {{--            </thead>--}}
    {{--            <tbody>--}}
    {{--            @foreach($tarefas as $key => $tarefa)--}}
    {{--                <tr>--}}
    {{--                    <td>{{ $tarefa->id }}</td>--}}
    {{--                    <td>{{ $tarefa->user->name }}</td>--}}
    {{--                    <td>{{ $tarefa->tarefa }}</td>--}}
    {{--                    <td>{{ date('d/m/y H:i:s', strtotime($tarefa->data_limite_conclusao)) }}</td>--}}
    {{--                    <td>{{ date('d/m/y H:i:s', strtotime($tarefa->created_at)) }}</td>--}}
    {{--                    <td>{{ date('d/m/y H:i:s', strtotime($tarefa->updated_at)) }}</td>--}}
    {{--                </tr>--}}
    {{--            @endforeach--}}
    {{--            </tbody>--}}
    {{--        </table>--}}
    <div class="page-break"></div>
{{--        <h1>teste</h1>--}}
    </body>
</html>
