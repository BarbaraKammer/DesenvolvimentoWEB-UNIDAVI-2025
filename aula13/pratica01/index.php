<?php
require_once "model/Endereco.php";
require_once "model/Contato.php";
require_once "model/Pessoa.php";

use app\model\Endereco;
use app\model\Contato;
use app\model\Pessoa;

// Endereço
$end = new Endereco();
$end->setLogradouro("Rua XPTO");
$end->setBairro("Centro");
$end->setCidade("Lontras");
$end->setEstado("SC");
$end->setCep("89182-000");

// Contato (agora seguindo o diagrama)
$cont = new Contato();
$cont->setTipo(1);              // ex.: 1 = telefone
$cont->setNome("Celular pessoal");
$cont->setValor("(47) 99999-9999");

// Pessoa
$p = new Pessoa();
$p->setNome("Barbara");
$p->setSobrenome("Kammer");
$p->setDataNascimento("2002-09-15");
$p->setCpfcnpj("123.456.789-10");
$p->setTipo(1);
$p->setTelefone($cont);
$p->setEndereco($end);

// Saída
echo "Nome completo: " . $p->getNomeCompleto() . "<br>";
echo "Idade: " . $p->getIdade() . "<br>";
echo "Contato: " . $cont->getNome() . " — " . $cont->getValor();
