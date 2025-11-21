<?php
namespace app\model;

class Endereco implements \JsonSerializable
{
    private string $logradouro;
    private string $bairro;
    private string $cidade;
    private string $estado; // char(2)
    private string $cep;

    public function jsonSerialize(): mixed
    {
        return [
            'logradouro' => $this->logradouro,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'cep' => $this->cep
        ];
    }

    public function toJson(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    
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
