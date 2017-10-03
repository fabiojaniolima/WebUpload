<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    protected $fillable = ['email', 'titulo', 'caminho', 'tag_id'];
    
    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
