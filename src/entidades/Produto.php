<?php
require_once 'Fabricante.php';

class Produto {
    private $descricao;
    private $preco;
    private $fabricante;

    public function __construct($descricao, $preco, Fabricante $fabricante) {
        $this->setDescricao($descricao);
        $this->setPreco($preco);
        $this->fabricante = $fabricante;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($valor) {
        $this->descricao = $valor;
    }
    
    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($valor) {
        $this->preco = $valor;
    }

    public function getDetalhes() {
        return "O produto {$this->descricao} da {$this->fabricante->getNome()} custa R$ {$this->preco}";
    }
}