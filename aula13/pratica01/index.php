<?php
require_once "model/Endereco.php";
require_once "model/Contato.php";
require_once "model/Pessoa.php";

use app\model\Endereco;
use app\model\Contato;
use app\model\Pessoa;

$end = new Endereco();
$end->setLogradouro("Rua XPTO");
$end->setBairro("Centro");
$end->setCidade("Lontras");
$end->setEstado("SC");
$end->setCep("89182-000");

$cont = new Contato();
$cont->setNome("Barbara"); 
$cont->setTelefone("(47) 99999-9999");

$p = new Pessoa();
$p->setNome("Barbara");
$p->setSobrenome("Kammer");
$p->setDataNascimento("2002-09-15");
$p->setCpfcnpj("123.456.789-10");
$p->setTipo(1);
$p->setTelefone($cont);
$p->setEndereco($end);

echo "Nome completo: " . $p->getNomeCompleto() . "<br>";
echo "Idade: " . $p->getIdade();
