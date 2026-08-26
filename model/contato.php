<?php

class Contato {
    private $conexao;
    
    public function __construct($db) {
        $this->conexao = $db;
    }

    // Listar todos os contatos
    public function listar() {
        $result = $this->conexao->query("SELECT * FROM contato");
        return $result->fetchAll();
    }

    // Listar um contato específico pelo contato_id
    public function listarContato($id) {
        $result = $this->conexao->query("SELECT * FROM contato WHERE contato_id=$id");
        return $result->fetch();
    }

    // Listar todos os contatos de UMA pessoa específica
    public function listarPorPessoa($pessoa_id) {
        $result = $this->conexao->query("SELECT * FROM contato WHERE pessoa_id=$pessoa_id");
        return $result->fetchAll();
    }

    // Cadastrar (precisa receber pessoa_id, tipo e numero)
    public function cadastrar($dados) {
        $result = $this->conexao->query("INSERT INTO contato(pessoa_id, tipo, numero) VALUES ({$dados['pessoa_id']}, '{$dados['tipo']}', '{$dados['numero']}')");
        return $result;
    }

    // Atualizar
    public function atualizar($id, $dados) {
        $result = $this->conexao->query("UPDATE contato SET tipo='{$dados['tipo']}', numero='{$dados['numero']}' WHERE contato_id=$id");
        return $result;
    }

    // Deletar
    public function deletarContato($id) {
        $result = $this->conexao->query("DELETE FROM contato WHERE contato_id=$id");
        return $result; 
    }
}