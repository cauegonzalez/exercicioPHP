<?php

require_once "Calculadora.class.php";
require_once "Palavra.class.php";

$array1 = array(1,2,3,4,5,6,7,8,9,1,2,3,1,2,1,9,9,9,9,0,0,0,0,0,0,0,0,1,5,3,8);
$array1 = array(1,2,3,3);
$calculadora = new Calculadora($array1);

?>
<meta charset="UTF-8">
<?php

echo "<pre>".print_r($array1, 1)."</pre>";
echo "<pre>moda: ".print_r($calculadora->moda(), 1)."</pre>";
echo "<pre>media: ".print_r($calculadora->media(), 1)."</pre>";
echo "<pre>mediana: ".print_r($calculadora->mediana(), 1)."</pre>";

$minhaPalavra = "socorram-me subi no ônibus em Marrocos";
$minhaPalavra = "somávamos";

echo "<br>";
echo "<br>";
$palavra = new Palavra();

if ($palavra->verificaSeEPalindromo($minhaPalavra))
{
    echo "A palavra <strong>".$minhaPalavra."</strong> é palindromo.";
    echo "<br>";
}
else
{
    echo "A palavra <strong>".$minhaPalavra."</strong> não é palindromo.";
    echo "<br>";
}

$primeiraLetraRepetida = $palavra->primeiraLetraRepetida($minhaPalavra);

if ($primeiraLetraRepetida !== false)
{
    echo "A primeira letra repetida &eacute; ".$primeiraLetraRepetida;
    echo "<br>";
}
else
{
    echo "Não existem letras repetidas na palavra fornecida.";
}