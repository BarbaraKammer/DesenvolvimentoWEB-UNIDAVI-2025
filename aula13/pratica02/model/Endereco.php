<?php
namespace app\model;

class Endereco
{
    private string $logradouro;
    private string $bairro;
    private string $cidade;
    private string $estado; // char(2)
    private string $cep;

    // Getters e Setters
    public function getLogradouro(): string { 
        return $this->logradouro; 
    }
    public function setLogradouro(string $logradouro): void { 
        $this->logradouro = $logradouro; 
    }

    public function getBairro(): string { 
        return $this->bairro; 
    }
    public function setBairro(string $bairro): void { 
        $this->bairro = $bairro; 
    }

    public function getCidade(): string { 
        return $this->cidade; 
    }
    public function setCidade(string $cidade): void { 
        $this->cidade = $cidade; 
    }

    public function getEstado(): string { 
        return $this->estado; 
    }
    public function setEstado(string $estado): void { 
        $this->estado = $estado; 
    }

    public function getCep(): string { 
        return $this->cep; 
    }
    public function setCep(string $cep): void { 
        $this->cep = $cep; 
    }
}
