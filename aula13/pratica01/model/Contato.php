<?php
namespace app\model;

class Contato
{
    private string $nome;
    private string $telefone;

    public function getNome(): string { 
        return $this->nome; 
    }
    public function setNome(string $nome): void { 
        $this->nome = $nome; 
    }

    public function getTelefone(): string { 
        return $this->telefone; 
    }
    public function setTelefone(string $telefone): void { 
        $this->telefone = $telefone; 
    }
}
