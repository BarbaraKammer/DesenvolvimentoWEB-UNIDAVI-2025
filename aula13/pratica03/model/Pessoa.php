<?php
namespace app\model;

class Pessoa implements \JsonSerializable
{
    private string $nome;
    private string $sobrenome;
    private string $dataNascimento;
    private string $cpfcnpj;
    private int $tipo;
    private Contato $telefone;
    private Endereco $endereco;

    public function jsonSerialize(): mixed
    {
        return [
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'dataNascimento' => $this->dataNascimento,
            'cpfcnpj' => $this->cpfcnpj,
            'tipo' => $this->tipo,
            'telefone' => $this->telefone,   // objeto Contato
            'endereco' => $this->endereco    // objeto Endereco
        ];
    }
        public function toJson(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // Getters e Setters
    public function getNome(): string { 
        return $this->nome; 
    }
    public function setNome(string $nome): void {
        $this->nome = $nome; 
    }

    public function getSobrenome(): string { 
        return $this->sobrenome; 
    }
    public function setSobrenome(string $sobrenome): void { 
        $this->sobrenome = $sobrenome; 
    }

    public function getDataNascimento(): string { 
        return $this->dataNascimento; 
    }
    public function setDataNascimento(string $dataNascimento): void { 
        $this->dataNascimento = $dataNascimento; 
    }

    public function getCpfcnpj(): string { 
        return $this->cpfcnpj; 
    }
    public function setCpfcnpj(string $cpfcnpj): void { 
        $this->cpfcnpj = $cpfcnpj; 
    }

    public function getTipo(): int { 
        return $this->tipo; 
    }
    public function setTipo(int $tipo): void { 
        $this->tipo = $tipo; 
    }

    public function getTelefone(): Contato { 
        return $this->telefone; 
    }
    public function setTelefone(Contato $telefone): void { 
        $this->telefone = $telefone; 
    }

    public function getEndereco(): Endereco { 
        return $this->endereco; 
    }
    public function setEndereco(Endereco $endereco): void { 
        $this->endereco = $endereco; 
    }

    public function getNomeCompleto(): string
    {
        return $this->nome . ' ' . $this->sobrenome;
    }

    public function getIdade(): int
    {
        $hoje = new \DateTime();
        $nasc = new \DateTime($this->dataNascimento);
        return $hoje->diff($nasc)->y;
    }

}
