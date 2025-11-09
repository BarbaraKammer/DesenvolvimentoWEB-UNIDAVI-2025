<?php
class Pessoa {
    private $nome;
    private $sobrenome;
    private $tipo;
    private $dataInstancia;
    

    public function __construct() {
        $this->nome = "";
        $this->sobrenome = "";
    }
    public function exibirNomeCompleto() {
        return $this->nome . " " . $this->sobrenome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }
}
?>