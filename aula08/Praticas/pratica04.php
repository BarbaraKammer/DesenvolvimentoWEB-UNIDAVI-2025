<?php

$salario1= 1000;
$salario2= 2000;
$salario2= $salario1;
++$salario2;
$salario1 = $salario1 * 1.10;

for ($x = 0; $x < 100; $x++) {
    ++$salario1;
    if ($x == 50) {
        break;
    }  
    
}

if($salario1 < $salario2) {
    echo $salario1;
}
?>

