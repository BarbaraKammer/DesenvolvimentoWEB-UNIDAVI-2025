<?php
require_once "model/Endereco.php";
require_once "model/Contato.php";
require_once "model/Pessoa.php";

use app\model\Endereco;
use app\model\Contato;
use app\model\Pessoa;

function criarPessoa(
    string $nome,
    string $sobrenome,
    string $dataNasc,
    string $cpf,
    int $tipo,
    string $tel
): Pessoa {
    $end = new Endereco();
    $end->setLogradouro("Rua XPTO");
    $end->setBairro("Centro");
    $end->setCidade("Rio do Sul");
    $end->setEstado("SC");
    $end->setCep("00000-000");

    $cont = new Contato();
    $cont->setNome($nome);
    $cont->setTelefone($tel);

    $p = new Pessoa();
    $p->setNome($nome);
    $p->setSobrenome($sobrenome);
    $p->setDataNascimento($dataNasc);
    $p->setCpfcnpj($cpf);
    $p->setTipo($tipo);
    $p->setTelefone($cont);
    $p->setEndereco($end);

    return $p;
}

//  instâncias para cada membro da família
$familia = [];
$familia[] = criarPessoa("Barbara", "Kammer", "2002-09-15", "111.111.111-11", 1, "(47) 99999-0000");
$familia[] = criarPessoa("Maristela", "Kammer", "1975-05-10", "222.222.222-22", 1, "(47) 99999-1111");
$familia[] = criarPessoa("Emerson", "Kammer", "1970-09-15", "333.333.333-33", 1, "(47) 99999-2222");
$familia[] = criarPessoa("Natalia", "Kammer", "2005-03-01", "444.444.444-44", 1, "(47) 99999-3333");

// montar conteúdo para o TXT
$conteudo = "";
foreach ($familia as $pessoa) {
    $conteudo .= "Nome completo: " . $pessoa->getNomeCompleto() . PHP_EOL;
    $conteudo .= "Idade: " . $pessoa->getIdade() . PHP_EOL;
    $conteudo .= "--------------------------------" . PHP_EOL;
}

// salvar no arquivo TXT
$arquivo = "familia.txt";
if (file_put_contents($arquivo, $conteudo) !== false) {
    echo "Arquivo '$arquivo' salvo com sucesso!<br>";
} else {
    echo "Erro ao salvar o arquivo '$arquivo'.<br>";
}

// mostrar na tela para conferencia
echo "<h2>Família cadastrada</h2>";
foreach ($familia as $pessoa) {
    echo "Nome: " . $pessoa->getNomeCompleto() . " | Idade: " . $pessoa->getIdade() . "<br>";
}
