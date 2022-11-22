<?php

class Conta
{
    
    private $titular;
    private $saldo = 0;
    private static $numeroDeContas = 0; //armazenando o numero de contas instanciadas 

    public function __construct(Titular $titular){

        $this->titular = $titular;
        $this->saldo = 0;
        self::$numeroDeContas++;
    }

    public function __destruct(){
        self::$numeroDeContas--;
    }

    public static function recuperaNumeroDeContas(): int{
        return self::$numeroDeContas;
    }

    private function validaNomeTitular(string $nomeTitular){

        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }

    public function saca(float $valorASacar): void{
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar): void{
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function transfere(float $valorATransferir, Conta $contaDestino): void{
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saca($valorATransferir);
        $contaDestino->deposita($valorATransferir);
    }

    public function recuperaSaldo(): float{
        return $this->saldo;
    }

    public function defineCpfTitular(string $cpf): void{
        $this->cpfTitular = $cpf;
    }

    public function recuperaCpfTitular(): string{
        return $this->cpfTitular;
    }

    public function defineNomeTitular(string $nome): void{
        $this->nomeTitular = $nome;
    }
    public function recuperarNomeTitular(): string{
        return $this->nomeTitular;
    }
}
