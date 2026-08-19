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
}