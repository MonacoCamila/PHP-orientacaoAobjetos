<?php

require_once 'src/Conta.php';
require_once 'src/Titular.php';

$primeiraConta = new Conta(new Titular('123.456.789-10', 'Vinicius Dias'));

$primeiraConta->deposita(500);
$primeiraConta->saca(300); // isso é ok

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$segundaConta = new Conta(new Titular('698.549.548-10', 'Patricia'));
var_dump($segundaConta);

$outra = new Conta(new Titular('123', 'Abcdefg'));
echo Conta::recuperaNumeroDeContas();



//Recapitulando: como definimos nossos atributos como privados, precisamos de métodos para conseguir acessá-los - 
//tanto para atribuirmos seus valores quanto para os recuperarmos.


