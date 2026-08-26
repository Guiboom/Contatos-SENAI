<?php

class ContatoController {
    private $contatoModel;

    public function __construct($contatoModel) {
        $this->contatoModel = $contatoModel;
    }

    public function processarRequisicao($metodo) {
        switch ($metodo) {
            case 'GET':
                if(isset($_GET['id'])) {
                    $this->listarContato($_GET['id']);
                } elseif(isset($_GET['pessoa_id'])) {
                    $this->listarPorPessoa($_GET['pessoa_id']);
                } else {
                    $this->listarTodos();
                }
                break;
            case 'POST':
                $this->cadastrar();
                break;
            case 'PUT':
                if(isset($_GET['id'])) {
                    $this->atualizar($_GET['id']);
                } else {
                    http_response_code(400);
                    echo json_encode(["mensagem" => "ID não fornecido"]);
                }
                break;
            case 'DELETE':
                if(isset($_GET['id'])) {
                    $this->deletarContato($_GET['id']);
                } else {
                    http_response_code(400);
                    echo json_encode(["mensagem" => "ID não fornecido"]);
                }
                break;
            default:
                http_response_code(405);
                echo json_encode(['mensagem'=>'Método não permitido']);
        }
    }

    public function listarTodos() {
        http_response_code(200);
        echo json_encode($this->contatoModel->listar());
    }

    public function listarContato($id) {
        echo json_encode($this->contatoModel->listarContato($id));
    }

    public function listarPorPessoa($pessoa_id) {
        echo json_encode($this->contatoModel->listarPorPessoa($pessoa_id));
    }

    public function cadastrar(){
        $dados = json_decode(file_get_contents('php://input'), true);   

        if(empty($dados['pessoa_id']) || empty($dados['tipo']) || empty($dados['numero'])) {
            http_response_code(400);
            echo json_encode(["mensagem"=>"Dados incompletos"]);
            return;
        }

        if($this->contatoModel->cadastrar($dados)) {
            http_response_code(201);
            echo json_encode(["mensagem" => "Contato Cadastrado"]);
        } else {
            http_response_code(500);
            echo json_encode(["mensagem" => "Erro ao Cadastrar"]);
        }
    }

    public function atualizar($id) {
        $dados = json_decode(file_get_contents('php://input'), true);

        if(empty($dados['tipo']) || empty($dados['numero'])) {
            http_response_code(400);
            echo json_encode(["mensagem" => "Dados incompletos"]);
            return;
        }

        if($this->contatoModel->atualizar($id, $dados)) {
            http_response_code(200);
            echo json_encode(["mensagem" => "Contato atualizado com sucesso"]);
        } else {
            http_response_code(500);
            echo json_encode(["mensagem" => "Erro ao atualizar contato"]);
        }
    }

    public function deletarContato($id) {
        if($this->contatoModel->deletarContato($id)) {
            http_response_code(200);
            echo json_encode(["mensagem" => "Contato deletado com sucesso"]);
        } else {
            http_response_code(500);
            echo json_encode(["mensagem" => "Erro ao deletar contato"]);
        }
    }
}