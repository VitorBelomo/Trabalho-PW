<?php

include_once 'Conectar.php';

class Passageiro {

    private $id;
    private $nome;
    private $data_nascimento;
    private $con;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDataNascimento() {
        return $this->data_nascimento;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setDataNascimento($data_nascimento): void {
        $this->data_nascimento = $data_nascimento;
    }

    public function listar($id) {
        try {
            $this->con = new Conectar();
            $sql = "CALL listar_passageiro (?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $id);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function inserir() {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO passageiro VALUES(NULL, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->nome);
            $executar->bindValue(2, $this->data_nascimento);
            return $executar->execute() == 1 ? "Inserir ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    // Outros métodos como update, delete etc., conforme necessário

}

//fim da class
?>
