<?php
namespace app\model;

class Contato implements \JsonSerializable
{
    private string $nome;
    private string $telefone;

    public function jsonSerialize(): mixed
    {
        return [
            'nome' => $this->nome,
            'telefone' => $this->telefone,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

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
