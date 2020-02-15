<?php
require_once 'entidades/Produto.php';
require_once 'entidades/Fabricante.php';

$fabricante = new Fabricante('Editora A');
$produto = new Produto('Livro', 49.99, $fabricante);
// $produto->setDescricao('Livro');
// $produto->setPreco(49.99);
echo $produto->getDetalhes();
