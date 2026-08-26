<?php

header("Content-type: application/json;charset=UTF-8");

require_once 'conexao.php';
require_once 'model/Contato.php';
require_once 'controller/contatoController.php';

$db = obterConexao();

$contatoModel = new Contato($db);
$controller = new ContatoController($contatoModel);

$controller->processarRequisicao($_SERVER['REQUEST_METHOD']);
exit;