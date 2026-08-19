<?php

class Pessoa {
    private $conexao;
    
    public function __construct($db) {
        $this->conexao = $db;
    }

    public function listar() {
        $result = $this->conexao->query("SELECT * FROM pessoas");
        return $result->fetchAll();
        
    }

    public function cadastrar($dados) {
        $result = $this->conexao->query("INSERT INTO pessoas(nome, email, idade) VALUES ('{$dados['nome']}', '{$dados['email']}', '{$dados['idade']}')");
        return $result;
    }
}