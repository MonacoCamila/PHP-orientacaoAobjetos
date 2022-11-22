<?php

namespace Alura\Banco\Modelo\Conta;

class Conta{

    private $titular;
    private $saldo;
    private static $numeroDeContas = 0;
    /**
     * @var int $tipo 1 = Conta Corrente; 2 = Poupança
     */
    private $tipo;

    public function __construct(Titular $titular, int $tipo)
    {
        $this->titular = $titular;
        $this->saldo = 0;
        $this->tipo = $tipo;
        self::$numeroDeContas++;
    }

    public function __destruct(){
        self::$numeroDeContas--;
    }

    public function saca(float $valorASacar): void
    {
        $tarifaSaque = $valorASacar * $this->percentualTarifa();
        $valorSaque = $valorASacar + $tarifaSaque;
        if ($valorSaque > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saldo -= $valorSaque;
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
    
    abstract public function percentualTarifa(): float;

    public function deposita(float $valorADepositar): void{
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
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
