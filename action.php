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
                session_start();
                $_SESSION["nome"] = $result[0]["nome"];
                $_SESSION["id"] = $result[0]["id"];
                $_SESSION["cpf"] = $cpf;
                echo json_encode(["status" => "ok"]);

            } else {
                echo json_encode(["status" => "erro"]);
            }
        }

        catch (PDOException $ex) {
            echo $ex;
        }
    }

    public function inserirAgenda($agenda) {
        try {
            global $conn;; 
            $sql = "INSERT INTO agenda (id_user,descricao,titulo,data_cri) VALUES (?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt -> bindValue(1, $agenda -> getIdUser());
            $stmt -> bindValue(2, $agenda -> getDescricao());
            $stmt -> bindValue(3, $agenda -> getTitulo());
            $stmt -> bindValue(4, $agenda -> getDate());
            $stmt -> execute();
            echo json_encode(["status" => "ok"]);
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
