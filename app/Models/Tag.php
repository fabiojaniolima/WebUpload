<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag', 'descricao', 'user_id'];
    
    public function arquivos()
    {
        return $this->hasMany('App\Models\Arquivo');
    }
}
