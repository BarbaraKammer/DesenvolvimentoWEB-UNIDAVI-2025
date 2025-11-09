<?php
    require_once "conexao.php";
    // Pegando os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $sobrenome = $_POST['sobrenome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $estado = $_POST['estado'] ?? '';


    $aDadosPessoa = array($nome,
                        $sobrenome,
                        $email,
                        $senha,
                        $cidade,
                        $estado);

    $resultInsert = pg_query_params($connection, "INSERT INTO tbpessoa (pesnome, 
                                                                        pessobrenome, 
                                                                        pesemail, 
                                                                        pespassword, 
                                                                        pescidade,
                                                                        pesestado) 
                                                    VALUES ($1, $2, $3, $4, $5, $6)",
                                                                        $aDadosPessoa);
    if ($resultInsert) {
        echo "<br>Dados inseridos com sucesso!";
    } else {
        echo "<br>Erro ao inserir dados.";
    }
?>

<a href="index.html">Voltar</a>

