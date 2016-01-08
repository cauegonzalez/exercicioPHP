<?php

class Calculadora
{
    private $array;

    /**
     * Método construtor responsável por inicializar o atributo array
     * 08/01/2016
     *
     * @param array $array
     * @author cauegonzalez
     */
    public function __construct($array)
    {
        $this->array = $array;
    }

    /**
     * Método responsável por contar os valores do array
     * 08/01/2016
     *
     * @param array $array
     * @return array
     * @author cauegonzalez
     */
    private function contaValoresArray($array)
    {
        //percorre o array
        foreach ($array as $key=>$value)
        {
            //verifica se o elemento atual está no array
            $achou = array_search($value, $array);
            if ($achou !== false)
            {
                //se achou, incrementa o valor da posição encontrada
                $arrayNovo[$achou] = $arrayNovo[$achou] + 1;
            }
        }

        return $arrayNovo;
    }

    /**
     * Método responsável por montar um array com as chaves dos elementos que aparecem mais vezes no array passado por parâmetro que deve estar em ordem decrescente
     * 08/01/2016
     *
     * @param array $array
     * @return array
     * @author cauegonzalez
     */
    private function buscaChaves($array)
    {
        //define uma variável auxiliar com o valor 0
        $aux = 0;
        //percorre o array
        foreach ($array as $key=>$value)
        {
            //verifica se o valor da posição atual é maior que o valor de $aux
            if ($value >= $aux)
            {
                //insere a chave atual no arrayChaves
                $arrayChaves[] = $key;
                //atualiza o valor de $aux para $value fazendo com que o $aux fique com o maior valor encontrado
                $aux = $value;
            }
            else
            {
                //como o array deve estar em ordem decrescente, não precisa continuar percorrendo depois que encontra um valor menor
                break;
            }
        }

        return $arrayChaves;
    }

    /**
     * Método responsável por retornar a moda de determinado array
     * 08/01/2016
     *
     * @param array $array
     * @return array
     * @author cauegonzalez
     */
    public function moda()
    {
        $arrayNovo = $this->contaValoresArray($this->array);

        //ordena arrayNovo em ordem decrescente
        arsort($arrayNovo);

        $arrayChaves = $this->buscaChaves($arrayNovo);

        $arrayResposta = array();
        //monta o array de resposta baseado nas chaves armazenadas em arrayChaves
        foreach ($arrayChaves as $value)
        {
            $arrayResposta[] = $this->array[$value];
        }
        return $arrayResposta;
    }

    /**
     * Método de callback para função array_filter responsável por limpar o array, retirando tudo o que não for numérico
     * 08/01/2016
     *
     * @param $elemento
     * @return boolean
     * @author cauegonzalez
     */
    private function limpa($elemento)
    {
        if (is_numeric($elemento))
        {
            return true;
        }
        return false;
    }

    /**
     * Método responsável por calcular a média do array informado por parâmetro
     * 08/01/2016
     *
     * @param array $array
     * @return float
     * @author cauegonzalez
     */
    private function mediaArray($array)
    {
        //limpa o array para aceitar apenas valores numéricos
        $array = array_filter($array, array($this, 'limpa'));
        //soma todos os elementos do array
        $soma = array_sum($array);
        //verifica quantos elementos existem no array
        $total = count($array);

        //retorna a média dos valores passados em $array
        return $soma/$total;
    }

    /**
     * Método responsável por calcular a média do atributo $array
     * 08/01/2016
     *
     * @param array $array
     * @return float
     * @author cauegonzalez
     */
    public function media()
    {
        return $this->mediaArray($this->array);
    }

    /**
     * Método responsável por retornar a mediana do atributo array
     * 08/01/2016
     *
     * @param array $array
     * @return float
     * @author cauegonzalez
     */
    public function mediana()
    {
        $array = $this->array;
        //ordena o array do atributo $array
        sort($array);

        //verifica quantos elementos existem no array
        $total = count($array);
        //pega o resto da divisão de total por 2
        $ePar = $total % 2;

        //determina o elemento do meio (parte inteira do último elemento dividido por 2)
        $meio = (int) (($total-1) / 2);
        //se for par
        if ($ePar == 0)
        {
            //monta um novo array com 2 elementos: o último da primeira metade e o primeiro da segunda metade
            $novoArray[] = $array[$meio];
            $novoArray[] = $array[$meio + 1];
            //retorna a média dos dois elementos encontrados
            return $this->mediaArray($novoArray);
        }

        //se não for par, retorna o elemento do meio
        return $array[$meio];
    }
}


