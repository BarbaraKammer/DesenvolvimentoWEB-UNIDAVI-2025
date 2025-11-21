<?php
namespace app\model;

class Pessoa
{
    // ---------- ATRIBUTOS ----------
    private string $nome;
    private string $sobrenome;
    private string $dataNascimento;
    private string $cpfcnpj;
    private int $tipo;
    private $telefone;
    private $endereco;

    // ---------- MÉTODOS ----------

    // Método para inicializar a classe 
    public function inicializaClasse(
        string $nome,
        string $sobrenome,
        string $dataNascimento,
        string $cpfcnpj,
        int $tipo,
        $telefone,
        $endereco
    ): void {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->dataNascimento = $dataNascimento;
        $this->cpfcnpj = $cpfcnpj;
        $this->tipo = $tipo;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

    // Retorna nome completo
    public function getNomeCompleto(): string
    {
        return $this->nome . ' ' . $this->sobrenome;
    }

    // Calcula idade baseado na data de nascimento
    public function getIdade(): int
    {
        $hoje = new \DateTime();
        $dataNasc = new \DateTime($this->dataNascimento);
        return $hoje->diff($dataNasc)->y;
    }
}
