<?php

namespace Alura\Banco\Servico;

class Autenticador{

    public function tentaLogin(Diretor $diretor, string $senha){
        if ($diretor->podeAutenticar($senha)) {
            echo "Ok. Usuário logado no sistema";
        } else {
         echo "Ops. Senha incorreta.";
        }
    }
}

