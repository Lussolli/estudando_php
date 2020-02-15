<?php
abstract class Conta {
    protected $agencia;
    protected $conta;
    protected $saldo;

    public function __construct($agencia, $conta, $saldo) {
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->saldo = $saldo;
    }

    public function getDetalhes() {
        return "Agência: {$this->agencia} | Conta: {$this->conta} | Saldo: {$this->saldo}<br>" . PHP_EOL;
    }

    public function depositar($valor) {
        $this->saldo += $valor;
        echo "Depósito de: {$valor} | Saldo atual: {$this->saldo}<br>" . PHP_EOL;
    }
}

final class Poupanca extends Conta {
    public function sacar($valor) {
        if ($this->saldo >= $valor) {
            $this->saldo -= $valor;
            echo "Saque de: {$valor} | Saldo atual: {$this->saldo}<br>" . PHP_EOL;
        } else {
            echo "Saque não autorizado de {$valor}. | Saldo atual: {$this->saldo}<br>" . PHP_EOL;
        }
    }
}

final class Corrente extends Conta {
    protected $limite;

    public function __construct($agencia, $conta, $saldo, $limite) {
        parent::__construct($agencia, $conta, $saldo);
        $this->limite;
    }

    public function sacar($valor) {
        if (($this->saldo + $this->limite >= $valor)) {
            $this->saldo -= $valor;
            echo "Saque de: {$valor} | Saldo atual: {$this->saldo}<br>" . PHP_EOL;
        } else {
            echo "Saque não autorizado de {$valor}. | Saldo atual: {$this->saldo}<br>" . PHP_EOL;
        }
    }
}

$poupanca = new Poupanca(100, 2586, 5000);
$poupanca->depositar(1890);
$poupanca->sacar(2300);
$poupanca->sacar(6300);
echo $poupanca->getDetalhes();

echo '<hr>';

$corrente = new Corrente(200, 2578, 5000, 500);
$corrente->depositar(1800);
$corrente->sacar(2500);
$corrente->sacar(9000);
echo $corrente->getDetalhes();

// $conta = new Conta(1, 1, 1); # Retorna uma exceção.
