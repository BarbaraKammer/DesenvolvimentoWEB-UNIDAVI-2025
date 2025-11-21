<?php
require_once "01_pessoa.php"; // importa a função

$nome = "João";
$sobrenome = "Silva";

echo "Nome completo: " . getNomeCompleto($nome, $sobrenome);
