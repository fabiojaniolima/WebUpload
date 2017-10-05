<?php

namespace App\Helpers;

use App\Models\Preferencia;

class PrefSistema
{
    /**
     * Verifica se o "auto registro" está ativo, ou seja, se usuários podem
     * se registrar
     * 
     * @return boolean
     */
    public static function auto_registro()
    {
        $pref = Preferencia::where('preferencia', 'auto_registro')->first();
        
        if(strtolower($pref->valor) === 'ativo') {
            return true;
        }
    }
}