<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Monitoramento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use App\Mail\AlertaOffline;



class AlertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            // Busca os dados da tabela "monitoramento"
            $dadosMonitoramento = Monitoramento::all();

            // Faz a chamada à API
            $response = Http::get('http://api.sawluz.net/swcore-gateway-control/api/central/statusinstancias');

            if ($response->successful()) {
                $dadosApi = $response->json();
            } else {
                $dadosApi = [];
            }

            // Passa os dados para a view
            return view('alertas.index', [
                'dadosMonitoramento' => $dadosMonitoramento,
                'dadosApi' => $dadosApi,
            ]);
        }

    public function enviarAlerta(Request $request)
    {
        $alias = $request->input('alias');
        $nomeInstancia = $request->input('nome_instancia');
        $g1 = $request->input('g1');

        $mensagem = "Seu Gateway está offline";
        $tituloEmail = "$alias - Torre de Tráfego Offline";

        $alertaOffline = new AlertaOffline($alias, $tituloEmail, $mensagem);
        Mail::to($g1)->send($alertaOffline);

        return redirect()->back()->with('success', 'Alerta enviado com sucesso!');
    }


}


