<?php 

include_once "action.php";

class Pessoa extends Action {
    private $nome;
    private $idade;
    private $cpf;
    private $endereco;

    public function setNome($nome) { $this->nome = $nome; }
    public function setIdade($idade) { $this->idade = $idade; }
    public function setCpf($cpf) { $this->cpf = $cpf; }
    public function setEndereco($endereco) { $this->endereco = $endereco; }
    
    public function getNome() {return $this->nome;}
    public function getIdade() {return $this->idade;}
    public function getCpf() {return $this->cpf;}
    public function getEndereco() {return $this->endereco;}

}