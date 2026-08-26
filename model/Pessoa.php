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

    public function listarPessoa($id) {
        $result = $this->conexao->query("SELECT * FROM pessoas WHERE pessoa_id=$id");
        return $result->fetch();
    }

    public function cadastrar($dados) {
        $result = $this->conexao->query("INSERT INTO pessoas(nome, email, idade) VALUES ('{$dados['nome']}', '{$dados['email']}', '{$dados['idade']}')");
        return $result;
    }

    public function atualizar($id, $dados) {
    $result = $this->conexao->query("UPDATE pessoas SET nome='{$dados['nome']}', email='{$dados['email']}', idade={$dados['idade']} WHERE pessoa_id=$id");
    return $result;
    }

    public function deletarPessoa($id) {
        $result = $this->conexao->query("DELETE FROM pessoas WHERE pessoa_id=$id");
        return $result; 
    }
}