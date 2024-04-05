<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class TarefaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $tarefas = Tarefa::where('user_id', $user_id)->paginate(10);
        return view('tarefa.index', ['tarefas' => $tarefas]);

//        $id = Auth::user()->id;
//        $name = Auth::user()->name;
//        $email = Auth::user()->email;
//        return "ID: $id | nome: $name | email: $email";

//        if (Auth::check()){
//            $id = Auth::user()->id;
//            $name = Auth::user()->name;
//            $email = Auth::user()->email;
//            return "ID: $id | nome: $name | email: $email";
//        } else{
//            return "Vc não ta logado";
//        }

//        if (auth()->check()){
//            $id = auth()->user()->id;
//            $name = auth()->user()->name;
//            $email = auth()->user()->email;
//            return "ID: $id | nome: $name | email: $email";
//        } else{
//            return "Vc não ta logado";
//        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = auth()->user()->id;
        $tarefa = Tarefa::create($dados);
        $destinatario = auth()->user()->email; // email do usuario
//        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        if ($tarefa->user_id == auth()->user()->id){
            return view('tarefa.edit', ['tarefa' => $tarefa]);
        }else{
            return view('acesso-negado');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        if ($tarefa->user_id == auth()->user()->id){
            $tarefa->update($request->all());
            return redirect()->route('tarefa.show', ['tarefa' => $tarefa]);
        } else{
            return view('acesso-negado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        if ($tarefa->user_id == auth()->user()->id){
            $tarefa->delete();
            return redirect()->route('tarefa.index');
        } else{
            return view('acesso-negado');
        }
    }


    public function exportacao($extensao){

        if ($extensao != "csv" && $extensao != "xlsx" && $extensao != 'pdf'){
            return redirect()->route('tarefa.index');
        }
        return Excel::download(new TarefasExport(), "Tarefas.$extensao");
    }

    public function export(){
        $tarefas = auth()->user()->tarefas()->get();
        $pdf = PDF::loadView('tarefa.pdf', ['tarefas' => $tarefas]);
//        return $pdf->download('Lista de Tarefas.pdf');
        $pdf->setPaper('a4', 'landscape');
        // tipo de papel: a4, letter
        // orietação: landscape(paisagem), portrait (retrato)
        return $pdf->stream('Lista de Tarefas.pdf');

    }
}
