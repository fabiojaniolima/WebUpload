<?php

namespace App\Helpers;

class Converter
{
    /**
     * Converte um valor numérico em uma capacidade "legível"
     * 
     * @param float|int $valor
     * @return string
     */
    public static function bytes($valor)
    {
        $capacidade = (float) $valor;
        
        if ($capacidade >= 1000000000) {
            $capacidade = sprintf('%.2f GB', $capacidade / 1000000000);
        } elseif ($capacidade >= 1000000) {
            $capacidade = sprintf('%.2f MB', $capacidade / 1000000);
        } elseif ($capacidade >= 1000) {
            $capacidade = sprintf('%.2f KB', $capacidade / 1000);
        } else {
            $capacidade = sprintf('%.2f B', $capacidade);
        }
        
        return $capacidade;
    }
}