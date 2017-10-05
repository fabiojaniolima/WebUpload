<?php

namespace App\Http\Controllers\Painel;

use App\Models\Preferencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreferenciaController extends Controller
{

    /**
     * Impede o acesso de usuários não autorizados as preferências de sistema
     */
    public function __construct()
    {
        $this->middleware('can:preferencias');
    }

    /**
     * Retorna as preferêmcoas de sistema
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prefSistema = Preferencia::all();

        foreach ($prefSistema as $p) {
            if ($p->preferencia == 'auto_registro' && $p->valor == 'ativo') {
                $pref = ['auto_registro' => 'checked'];
            }
        }

        return view('painel.preferencias.configuracoes', compact('pref'));
    }

    /**
     * Persiste as alterações de preferências em banco
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function alterar(Request $request)
    {
        $status = ($request->auto_registro == 'on') ? 'ativo' : 'desligado';

        $retorno = Preferencia::where('preferencia', 'auto_registro')
                ->update(['valor' => $status]);

        if ($retorno) {
            return redirect('/painel/preferencias')
                            ->with(['status' => 'success', 'msg' => 'Alteração salva com sucesso!']);
        }

        return redirect('/painel/preferencias')
                        ->with(['status' => 'danger', 'msg' => 'Ocorreu um erro inesperado!']);
    }

}
