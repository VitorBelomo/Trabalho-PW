<?php

include_once 'Conectar.php';

class Onibus {

    private $id;
    private $modelo;
    private $lugares;
    private $destino;
    private $con;

    public function getId() {
        return $this->id;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getLugares() {
        return $this->lugares;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setModelo($modelo): void {
        $this->modelo = $modelo;
    }

    public function setLugares($lugares): void {
        $this->lugares = $lugares;
    }

    public function setDestino($destino): void {
        $this->destino = $destino;
    }

    public function listar($id) {
        try {
            $this->con = new Conectar();
            $sql = "CALL listar_onibus (?)";
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
            $sql = "INSERT INTO onibus VALUES(NULL, ?, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->modelo);
            $executar->bindValue(2, $this->lugares);
            $executar->bindValue(3, $this->destino);
            return $executar->execute() == 1 ? "Inserir ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    // Outros métodos como update, delete, etc., conforme necessário

}

// fim da class
