<?php

header("Content-type: application/json;charset=UTF-8");

require_once 'conexao.php';
require_once 'Model/Pessoa.php';
require_once 'Controller/pessoaController.php';

$db = obterConexao();

$pessoaModel = new Pessoa($db);

$controller = new PessoaController($pessoaModel);
$controller->processarRequisicao($_SERVER['REQUEST_METHOD']);
