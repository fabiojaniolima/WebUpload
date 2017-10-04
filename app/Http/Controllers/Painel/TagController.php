<?php

namespace App\Http\Controllers\Painel;

use Auth;
use Validator;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Regras de validação
     * 
     * @var array
     */
    private $regras;
    
    /**
     * Callback de validação
     * 
     * @var array
     */
    private $mensagens;
    
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
        $this->regras = [
            'tag' => 'required|max:25|unique:tags,tag',
            'descricao' => 'max:150'
        ];
        
        $this->mensagens = [
            'tag.unique' => 'Essa tag já está em uso!'
        ];
        
        $this->redirect = '/painel/tags';
    }

    /**
     * Lista todas as tags do usuário
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::where('user_id', Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->withCount('arquivos')
                        ->paginate(25);

        return view('painel.tags.index', compact('tags'));
    }
    
    /**
     * Mostra o formulário de criação ou edição
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function cad_edit($id = null)
    {
        if($id) {
            $tag = Tag::find($id);
            return view('painel.tags.cad-edit', compact('tag'));
        }
        
        return view('painel.tags.cad-edit');
    }
    
    /**
     * Persiste o registro em banco
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function criar(Request $request)
    {
        $request->validate($this->regras);
        
        $request->merge(['user_id' => Auth::id(), 'tag' => strtoupper($request->tag)]);
        
        if (Tag::create($request->all())) {
            return redirect($this->redirect)
                        ->with(['status' => 'success', 'msg' => 'Tag criada com sucesso!']);
        }

        return redirect($this->redirect)
                    ->with(['status' => 'danger', 'msg' => 'Ocorreu um erro inesperado!']);
    }
    
    /**
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id)
    {        
        $validator = Validator::make($request->all(), $this->regras, $this->mensagens);

        if ($validator->fails()) {
            return redirect($this->redirect)
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $tag = Tag::find($id);
        
        if($tag->update($request->all())) {
            return redirect($this->redirect)
                        ->with(['status' => 'success', 'msg' => 'Tag salva com sucesso!']);
        }
        
        return redirect($this->redirect)
                    ->with(['status' => 'danger', 'msg' => 'Ocorreu um erro inesperado!']);
    }
    
    /**
     * Exclui a tag e todos os arquivos associados
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function excluir($id)
    {
        $tag = Tag::find($id);
        
        $arq_metodo = new \App\Http\Controllers\Painel\ArquivoController;

        foreach ($tag->arquivos as $arq) {
            $arq_metodo->excluir($arq->id);
        }
        
        if($tag->delete()) {
            return redirect($this->redirect)
                        ->with(['status' => 'success', 'msg' => 'Tag excluida!']);            
        }
        
        return redirect($this->redirect)
                    ->with(['status' => 'danger', 'msg' => 'Ocorreu um erro inesperado!']);
    }

}
