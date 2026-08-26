<?php

class PessoaController {
    private $pessoaModel;

    public function __construct($pessoaModel) {
        $this->pessoaModel = $pessoaModel;
    }

    public function processarRequisicao($metodo) {
        switch ($metodo) {
            case 'GET':
                if(isset($_GET['id'])) {
                    $this->listarPessoa($_GET['id']);
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
                    $this->deletarPessoa($_GET['id']);
                } else {
                    http_response_code(400);
                    echo json_encode(["mensagem" => "ID não fornecido"]);
                };
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
        $dados = json_decode(file_get_contents('php://input'), true);   

        if(empty($dados['nome']) || empty($dados['email']) || empty($dados['idade'])) {
            http_response_code(400);
            echo json_encode(["mensagem"=>"Dados incompleto"]);
            return;
        }

        if($this->pessoaModel->cadastrar($dados)) {
            http_response_code(201);
            echo json_encode(["mensagem" => "Pessoa Cadastrada"]);
        } else {
            http_response_code(500);
            echo json_encode(["mensagem" => "Erro ao Cadastrar"]);
        }
    }

    public function listarPessoa($id) {
         echo json_encode($this->pessoaModel->listarPessoa($id));
    }

    public function deletarPessoa($id) {
        if($this->pessoaModel->deletarPessoa($id)) {
            http_response_code(200);
            echo json_encode(["mensagem" => "Pessoa deletada com sucesso"]);
        } else {
            http_response_code(500);
            echo json_encode(["mensagem" => "Erro ao deletar pessoa"]);
        }
    }

    public function atualizar($id) {
    $dados = json_decode(file_get_contents('php://input'), true);

    if(empty($dados['nome']) || empty($dados['email']) || empty($dados['idade'])) {
        http_response_code(400);
        echo json_encode(["mensagem" => "Dados incompletos"]);
        return;
    }

    if($this->pessoaModel->atualizar($id, $dados)) {
        http_response_code(200);
        echo json_encode(["mensagem" => "Pessoa atualizada com sucesso"]);
    } else {
        http_response_code(500);
        echo json_encode(["mensagem" => "Erro ao atualizar pessoa"]);
    }
}
}