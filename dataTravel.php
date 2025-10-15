<?php
session_start();

include_once "conn.php";
include_once "pessoa.php";
include_once "action.php";

$acao = $_GET["action"];

switch($acao) {
    case "inserirUser":
        $pessoa = criarPessoa();
        $action = new Action();
        $action -> inserirUser($pessoa);
    break;
        
    case "consultarUser":
        $cpf = $_GET["cpf"];
        $senha = $_GET["senha"];
        $action = new Action();
        $ver = $action -> consultarUser($cpf,$senha);
        echo $ver;
        return $ver;
    break;

    case "criarAgenda":
        $agenda = criarAgenda();
        $action = new Action();
        $action -> inserirAgenda($agenda);
    break;
}

function criarAgenda() {
    $titulo = $_GET["titulo"];
    $date = $_GET["date"];
    $descricao = $_GET["descricao"];
    $agenda = new Agenda();
    $agenda->setTitulo($titulo);
    $agenda->setDate($date);
    $agenda->setDescricao($descricao);
    $agenda->setIdUser($_SESSION["id"]);
    return $agenda;
}

function criarPessoa() {
    $nome =     $_GET["nome"];
    $idade =    $_GET["idade"];
    $cpf =      $_GET["cpf"];
    $endereco = $_GET["endereco"];
    $senha =    $_GET["senha"];

    $pessoa = new Pessoa();
    $pessoa -> setNome($nome);
    $pessoa -> setIdade($idade);
    $pessoa -> setCpf($cpf);
    $pessoa -> setEndereco($endereco);
    $pessoa -> setSenha($senha);
    return $pessoa;
}
