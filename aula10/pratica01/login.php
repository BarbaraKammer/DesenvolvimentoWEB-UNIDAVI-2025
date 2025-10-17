<?php

    session_start();
    
    if(!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = $_POST['loginforms'];
        $_SESSION['senha'] = $_POST['senhaforms'];

        echo "Sessão iniciada e usuário registado.";
    } else {
        echo "Usuário: " . $_SESSION['usuario'] . "já está logado. <br>";
        echo "Senha: " . $_SESSION['senha'] . "<br>";
    }
?>