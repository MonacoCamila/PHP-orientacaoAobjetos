<?php

use Alura\Banco\Modelo\Conta\conta2;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$conta = new Conta(
    new Titular(
        new CPF('123.456.789-10'),
        'Vinicius Dias',
        new Endereco('Petropolis', 'bairro Teste', 'Rua lá', '37'),
    ),
    1
);

$conta->deposita(500);
$conta->saca(100);
echo $conta->recuperaSaldo();