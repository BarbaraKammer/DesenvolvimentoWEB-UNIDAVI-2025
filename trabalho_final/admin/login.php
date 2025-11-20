<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Administrativo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/login.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

<div class="card p-4" style="width:380px;">
    <h3 class="text-center mb-4">Painel Administrativo</h3>
    <?php if(isset($_GET["err"])) echo "<p class='text-danger text-center'>Login inválido</p>"; ?>
    <form action="login_action.php" method="POST">
        <input type="text" name="login" class="form-control mb-3" placeholder="Usuário" required>
        <input type="password" name="senha" class="form-control mb-3" placeholder="Senha" required>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</div>

</body>
</html>