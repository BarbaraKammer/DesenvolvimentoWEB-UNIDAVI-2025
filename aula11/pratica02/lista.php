<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pessoas</title>
</head>
<body>
    <h2>Lista de Pessoas Cadastradas</h2>

    <form method="get" action="lista.php">
        <label for="busca">Buscar por nome:</label>
        <input type="text" id="busca" name="busca" placeholder="Digite o nome">
        <input type="submit" value="Filtrar">
        <a href="lista.php">Limpar</a>
    </form>

    <hr>

    <?php include "lista_pessoa.php"; ?>

    <br>
    <a href="index.html">Voltar</a>
</body>
</html>
