<?php 

class Agenda extends Action {
    private $titulo;
    private $descricao;
    private $id_user;

    public function __construct($titulo,$descicao,$id_user) {
        $this->titulo = $titulo;
        $this->descricao = $descicao;
        $this->id_user = $id_user;
    }

    public function getTitulo() { return $this->titulo; }
    public function getDescricao() { return $this->descricao; }
    public function getIdUser() { return $this->id_user; }
}
