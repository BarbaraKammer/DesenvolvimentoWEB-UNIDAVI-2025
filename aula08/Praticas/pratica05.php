<?php

$disciplinas = array("Estrutura de dados", "Eng. de Software", "Adm de Sistemas", "Programação Web", "Banco de dados");
$professores = array("Bastos", "Jullian", "Marciel", "Cleber", "Marco");

for ($x = 0; $x < 5; $x++) {
echo "Disciplina: " . $disciplinas[$x] . " " . "Professor: " . $professores[$x] . "<br>";
}

echo "<br>";

$disciplina = array("Estrutura"=>"Bastos",  "Eng. de Software"=>"Jullian", "Adm de Sistemas"=>"Marciel", "Programação Web"=>"Cleber", "Banco de dados"=> "Marco");
foreach($disciplina as $chave => $valor) {
echo "Disciplina = " . $chave . ", Professor=" . $valor;
echo "<br>";
}
?>