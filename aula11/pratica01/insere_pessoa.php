<?php
    $connectionString = "host=localhost port=5432 dbname=local user=postgres password=12345";
    
    $connection = pg_connect($connectionString);
    
    if (!$connection) {
        echo "Erro na conexão com o banco de dados.";
    } else {
        echo "Conexão bem-sucedida!<br>";

        $result = pg_query($connection, "SELECT COUNT(*) AS qtd FROM tbpessoa");

        if (!$result) {
            echo "Erro na consulta.";
        } else {
            $row = pg_fetch_assoc($result);
            echo "Quantidade de tabelas no database: " . $row['qtd'];
        }

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
                                                                                                    pespassword, pescidade,
                                                                                                    pesestado) 
                                                                            VALUES ($1, $2, $3, $4, $5, $6)",
                                                                            $aDadosPessoa);
        if ($resultInsert) {
            echo "<br>Dados inseridos com sucesso!";
        } else {
            echo "<br>Erro ao inserir dados.";
        }
    }
    //criar um html pro form um php pra receber os dados e outro php pra listar os dados
?>

<a href="index.html">Voltar</a>

