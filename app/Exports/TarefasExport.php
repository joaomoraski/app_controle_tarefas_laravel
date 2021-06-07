<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        return Tarefa::all();
        return auth()->user()->tarefas()->get();
    }

    public function headings(): array // titulos pra parada ai
    {
        return ['ID da Tarefa', 'Dono da tarefa', 'Tarefa', 'Data limite conclusão', 'Data criação', 'Data atualização'];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->user->name, // trazer o nome do fulano
            $row->tarefa,
            date('d/m/y H:i:s', strtotime($row->data_limite_conclusao)),
            date('d/m/y H:i:s', strtotime($row->created_at)),
            date('d/m/y H:i:s', strtotime($row->updated_at)),
        ];
    }
}
