<?php

namespace App\Http\Controllers\Painel;

use App\Models\Tag;
use App\Models\Arquivo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num_uploads = Arquivo::count();
        $num_tags = Tag::where('user_id', \Auth::id())->count();

        $hoje = Arquivo::whereDate('created_at', \DB::raw('CURDATE()'))
                ->count();

        $num_usuarios = Arquivo::select('email')
                ->distinct()
                ->count();

        return view('painel.home', compact('num_uploads', 'num_tags', 'num_usuarios', 'hoje'));
    }

}
