<?php

namespace App\Http\Controllers\Site;

use App\Models\Tag;
use App\Models\Arquivo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * Método responsável por realizar o download dos arquivos
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'titulo' => 'max:30',
            'tag' => 'exists:tags,tag|required|max:25',
            'arquivo' => 'required|file|max:30720|mimes:zip,rar,pdf,doc,docx'
        ]);

        $tag = Tag::select('id')
                        ->where('tag', $request->tag)
                        ->first();

        $caminho = $request->arquivo->store('public/uploads/' . date('Y/m'));

        $request->merge(['tag_id' => $tag->id, 'caminho' => $caminho]);

        if ($caminho && Arquivo::create($request->all())) {
            return redirect('/')
                        ->with(['status' => 'success', 'msg' => 'Arquivo enviado!']);
        }

        \Storage::delete($caminho);

        return redirect('/')
                    ->with(['status' => 'danger', 'msg' => 'Ocorreu um erro inesperado!']);
    }
}
