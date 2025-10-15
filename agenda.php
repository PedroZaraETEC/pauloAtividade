<?php 

class Agenda extends Action {
    private $titulo;
    private $descricao;
    private $date;
    private $id_user;

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getTitulo() { return $this->titulo; }
    public function getDescricao() { return $this->descricao; }
    public function getIdUser() { return $this->id_user; }
    public function getDate() { return $this->date; }
}
