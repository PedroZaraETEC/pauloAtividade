<?php 
include_once "conn.php";
include_once "pessoa.php";
include_once "agenda.php";
include_once "dataTravel.php";

class Action {
    private $action;
    
    public function inserirUser($pessoa) {
        try {
            global $conn;
            $sql = "INSERT INTO user (nome,cpf,idade,endereco,senha) VALUES (?,?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt -> bindValue(1, $pessoa->getNome());
            $stmt -> bindValue(2, $pessoa->getCpf());
            $stmt -> bindValue(3, $pessoa->getIdade());
            $stmt -> bindValue(4, $pessoa->getEndereco());
            $stmt -> bindValue(5, $pessoa->getSenha());
            $stmt->execute();
        }
        
        catch (PDOException $err) {
            echo $err;
        }
    }

    public function consultarUser($cpf,$senha) {
        try {
            global $conn;
            $sql = "SELECT * FROM user WHERE cpf = $cpf and senha = $senha;";
            $stmt = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($result) {
            echo json_encode(["status" => "ok"]);
            } else {
            echo json_encode(["status" => "erro"]);
            }
        }

        catch (PDOException $ex) {
            echo $ex;
        }
    }

    public function inserirAgenda() {
        try {
            global $conn;
            $sql = "INSERT INTO agenda (id_user,descricao,titulo) VALUES (?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt = bindValue(1, Agenda->getIdUser());
            $stmt = bindValue(2, Agenda->getDescricao());
            $stmt = bindValue(3, Agenda->getTitulo());
            $stmt->execute();
        }
        
        catch (PDOException $err) {
            echo $err;
        }
    }

    public function consultarAgenda() {
        try {
            global $conn;
            $sql = "SELECT * FROM agenda;";
            $stmt = $conn->query($sql);
            return $stmt->fecthAll(PDO::FETCH_ASSOC);  
        }

        catch (PDOException $ex) {
            echo $ex;
        }
    }
}
