<?php 

$host = "localhost";
$user = "root";
$db = "siteprojeto";
$senha = "";
$port = "3306";

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $senha);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $err) {
    echo "Problema encontrado: ".$err;
}
