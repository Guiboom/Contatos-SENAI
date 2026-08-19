<?php

class PessoaController {
    private $pessoaModel;

    public function __construct($pessoaModel) {
        $this->pessoaModel = $pessoaModel;
    }

    public function processarRequisicao($metodo) {
        switch ($metodo) {
            case 'GET':
                $this->listarTodos();
                break;
            case 'POST':
                $this->cadastrar();
                break;
            default:
                http_response_code(405);
                echo json_encode(['mensagem'=>'Método não permitido']);
        }
    }

    public function listarTodos() {
        http_response_code(200);
        echo json_encode($this->pessoaModel->listar());
    }

    public function Cadastrar(){
        
    }
}