<?php

class Palavra
{
    /**
     * Método responsável por limpar a string
     * 08/01/2016
     *
     * @param string $palavra
     * @return string
     * @author cauegonzalez
     */
    private function retiraCaracteresEspeciais($palavra)
    {
        $arrayCharEspecial = array('á','à','ã','â','ä','é','è','ê','ë','í','ì','î','ï','ó','ò','õ','ô','ö','ú','ù','û','ü','ç','Á','À','Ã','Â','Ä','É','È','Ê','Ë','Í','Ì','Î','Ï','Ó','Ò','Õ','Ö','Ô','Ú','Ù','Û','Ü','Ç',' ','-', ',');
        $arrayCharComum    = array('a','a','a','a','a','e','e','e','e','i','i','i','i','o','o','o','o','o','u','u','u','u','c','A','A','A','A','A','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','C','','','');

        return str_replace($arrayCharEspecial, $arrayCharComum, $palavra);
    }

    /**
     * Método responsável por verificar se a palavra passada é um palíndromo
     * 08/01/2016
     *
     * @param string $palavra
     * @return boolean
     * @author cauegonzalez
     */
    public function verificaSeEPalindromo($palavra)
    {
        $arrayPalavra           = str_split($this->retiraCaracteresEspeciais($palavra));
        $arrayPalavraInvertida  = array_reverse($arrayPalavra);

        $strPalavra             = implode('', $arrayPalavra);
        $strPalavraInvertida    = implode('', $arrayPalavraInvertida);

        return (strtoupper($strPalavra) == strtoupper($strPalavraInvertida));
    }

    /**
     * Método responsável por retornar a primeira letra repetida
     * 08/01/2016
     *
     * @param string $palavra
     * @return char|boolean
     * @author cauegonzalez
     */
    public function primeiraLetraRepetida($palavra)
    {
        $arrayPalavra   = str_split(strtoupper($this->retiraCaracteresEspeciais($palavra)));

        $arrayRepetidos = array_count_values($arrayPalavra);

        foreach ($arrayRepetidos as $key => $value)
        {
            if ($value > 1)
            {
                return $key;
            }
        }

        return false;
    }
}