<?php

namespace App\Http\Controllers;
use App\Models\Monitoramento;
use Illuminate\Http\Request;


class ParceirosController extends Controller
{
    public function index()
    {
        $monitoramentos = Monitoramento::all(); // Obtém todos os registros da tabela monitoramento

        return view('parceiros.index', compact('monitoramentos'));
    }


    public function edit($idEntidade)
    {
        $monitoramento = Monitoramento::where('idEntidade', $idEntidade)->firstOrFail();

        return view('parceiros.edit', compact('monitoramento'));
    }


    public function update(Request $request, $idEntidade)
    {
        $monitoramento = Monitoramento::where('idEntidade', $idEntidade)->firstOrFail();

        $monitoramento->idEntidade = $request->input('idEntidade');
        $monitoramento->alias = $request->input('alias');
        $monitoramento->nomeInstancia = $request->input('nomeInstancia');
        $monitoramento->tipo = $request->input('tipo');
        $monitoramento->prioridade = $request->input('prioridade');

        $monitoramento->save();

        return redirect()->route('parceiros')->with('success', 'Registro atualizado com sucesso!');
    }

    public function create()
    {
        return view('parceiros.create');
    }

    public function store(Request $request)
{
    $monitoramento = new Monitoramento();
    $monitoramento->idEntidade = $request->input('idEntidade');
    $monitoramento->alias = $request->input('alias');
    $monitoramento->nomeInstancia = $request->input('nomeInstancia');
    $monitoramento->tipo = $request->input('tipo');
    $monitoramento->prioridade = $request->input('prioridade');
    $monitoramento->save();

    return redirect()->route('parceiros')->with('success', 'Registro adicionado com sucesso!');
}


}
