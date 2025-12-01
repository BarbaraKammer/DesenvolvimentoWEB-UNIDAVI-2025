<?php
namespace app\model;

class Contato implements \JsonSerializable
{
    private int $tipo;     
    private string $nome; 
    private string $valor; 

    public function jsonSerialize(): mixed
    {
        return [
            'tipo' => $this->tipo,
            'nome' => $this->nome,
            'valor' => $this->valor,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // Getters e Setters
    public function getTipo(): int {
        return $this->tipo;
    }
    public function setTipo(int $tipo): void {
        $this->tipo = $tipo;
    }

    public function getNome(): string {
        return $this->nome;
    }
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getValor(): string {
        return $this->valor;
    }
    public function setValor(string $valor): void {
        $this->valor = $valor;
    }
}
