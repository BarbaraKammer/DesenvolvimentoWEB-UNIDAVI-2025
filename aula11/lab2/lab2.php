<?php
/* É uma boa prática fazer a conexão com o SGBD e qualquer outra operação subsequente dentro de um try/catch */
try {
    /* Etapa 1 - Criar uma instância da classe de conexão e definir os parâmetros de conexão */
    $dbconn = pg_connect("host=localhost port=5432 dbname=local user=postgres password=12345");
    
    if ($dbconn) {
        echo "Database conectado...<br>";

        /* Etapa 2 - Fazer uma query simples - retornará a quantidade de tabelas no database */
        $result = pg_query($dbconn, "SELECT COUNT(*) AS qtd_tabs FROM pg_tables");

        /* Etapa 3 - Buscar os dados da query e percorrer as linhas */
        while ($row = pg_fetch_assoc($result)) {
            echo "Tabelas no banco: " . $row['qtd_tabs'] . "<br>";
        }

        /* Etapa 4 - Preparar o array de dados para ser enviado ao SGBD */
        $aDados = array(
            $_POST['campo_primeiro_nome'],
            $_POST['campo_sobrenome'],
            $_POST['campo_email'],
            $_POST['campo_password'],
            $_POST['campo_cidade'],
            $_POST['campo_estado']
        );

        /* Etapa 5 - Fazer a query de inserção dos dados (DML) com o array de valores */
        $result = pg_query_params(
            $dbconn,
            "INSERT INTO TBPESSOA
                (PESNOME, PESSOBRENOME, PESEMAIL, PESPASSWORD, PESCIDADE, PESESTADO)
            VALUES ($1, $2, $3, $4, $5, $6)",
            $aDados
        );

        if ($result) {
            echo "Registro inserido com sucesso!";
        } else {
            echo "Erro ao inserir: " . pg_last_error($dbconn);
        }
    }

} catch (Exception $e) {
    /* Caso ocorra algum erro, então exibir mensagem */
    echo "Erro: " . $e->getMessage();
}
?>
