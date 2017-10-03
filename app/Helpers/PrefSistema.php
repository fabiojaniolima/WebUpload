<?php

namespace App\Helpers;

use App\Models\Preferencia;

class PrefSistema
{
    public static function auto_registro()
    {
        $pref = Preferencia::where('preferencia', 'auto_registro')->first();
        
        if(strtolower($pref->valor) === 'ativo') {
            return true;
        }
    }
}