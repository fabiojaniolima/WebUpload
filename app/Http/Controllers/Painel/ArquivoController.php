<?php

namespace App\Http\Controllers\Painel;

use Auth;
use App\Models\Arquivo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArquivoController extends Controller
{
    /**
     * URL default de redirect
     * 
     * @var string
     */
    private $redirect;
    
    /**
     * Definições iniciais
     */
    public function __construct()
    {
        $this->redirect = '/painel/arquivos';
    }
    /**
     * Lista todos os arquivos associados as tags do usuário
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arquivos = Arquivo::join('tags', 'tags.id', '=', 'arquivos.tag_id')
                        ->where('tags.user_id', Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->select('arquivos.*')
                        ->paginate(25);

        return view('painel.arquivos.index', compact('arquivos'));
    }
    
    /**
     * Retorna link de download do arquivo
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $arq = Arquivo::join('tags', 'tags.id', '=', 'arquivos.tag_id')
                    ->where('tags.user_id', Auth::id())
                    ->where('arquivos.id', $id)
                    ->first();

        if ($arq) {
            $caminho = storage_path('app/' . $arq->caminho);

            return response()->download($caminho, str_slug($arq->titulo, '-') . '.' . File::extension($caminho));
        }

        return redirect($this->redirect)
                    ->with(['status' => 'danger', 'msg' => 'Você não tem permissão para baixar este arquivo!']);
    }
    
    /**
     * Método para excluir arquivo
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function excluir($id)
    {
        $arq = Arquivo::join('tags', 'tags.id', '=', 'arquivos.tag_id')
                    ->where('tags.user_id', Auth::id())
                    ->where('arquivos.id', $id)
                    ->first();

        if ($arq) {
            Storage::delete($arq->caminho);

            $arq = Arquivo::find($id);
            $arq->delete();

            return redirect($this->redirect)
                        ->with(['status' => 'success', 'msg' => 'Arquivo excluido!']);
        }

        return redirect($this->redirect)
                    ->with(['status' => 'danger', 'msg' => 'Ocorreu um erro!']);
    }
}
