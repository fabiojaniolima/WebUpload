<?php

namespace App\Http\Controllers\Painel;

use App\Models\Preferencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreferenciaController extends Controller
{
    public function index()
    {
        $prefSistema = Preferencia::all();
                $pref = [];
        foreach ($prefSistema as $p)
        {
            if($p->preferencia == 'auto_registro' && $p->valor == 'ativo') {
                $pref = ['auto_registro' => 'checked'];
            }
        }
                
        return view('painel.preferencias.configuracoes', compact('pref'));
    }
    
    public function alterar(Request $request)
    {
        $status = ($request->auto_registro == 'on') ? 'ativo' : 'desligado';
        
        $retorno = Preferencia::where('preferencia', 'auto_registro')
                                ->update(['valor' => $status]);
        
        if($retorno) {
            return redirect('/painel/preferencias/configuracoes')
                        ->with(['status' => 'success', 'msg' => 'Alteração salva com sucesso!']);
        }
        
        return redirect('/painel/preferencias/configuracoes')
                    ->with(['status' => 'danger', 'msg' => 'Ocorreu um erro inesperado!']);
    }
}
