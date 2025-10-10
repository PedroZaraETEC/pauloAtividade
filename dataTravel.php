<?php
include_once "conn.php";
include_once "pessoa.php";
include_once "action.php";

$acao = $_GET["action"];

function criarPessoa($nome,$idade,$cpf,$endereco) {
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];
    $cpf = $_GET["cpf"];
    $endereco = $_GET["endereco"];

    $pessoa = new Pessoa();
    $pessoa -> setNome($nome);
    $pessoa -> setIdade($idade);
    $pessoa -> setCpf($cpf);
    $pessoa -> setEndereco($endereco);
    return $pessoa;
}

switch($acao) {
    case "inserirUser":
        $pessoa = criarPessoa($nome,$idade,$cpf,$endereco);
        $action = new Action();
        $action->inserirUser($pessoa);
    break;

    case "consultarUser":
        $cpf = $_GET["cpf"];
        $action = new Action();
        $action -> consultarUser($cpf);
}