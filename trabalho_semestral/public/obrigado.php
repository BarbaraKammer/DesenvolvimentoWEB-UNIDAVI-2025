<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Obrigado</title>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="refresh" content="10;url=index.php"> <!-- Redirecionamento automático -->
    <script>
        // Exibe a contagem regressiva na tela (opcional)
        let segundos = 10;
        function contagem() {
            const contador = document.getElementById("contador");
            const intervalo = setInterval(() => {
                segundos--;
                contador.textContent = segundos;
                if (segundos <= 0) clearInterval(intervalo);
            }, 1000);
        }
        window.onload = contagem;
    </script>
</head>
<body>
    <div class="container obrigado">
        <div class="icone-coracao">❤️</div>
        <h2>O Estabelecimento agradece sua resposta!</h2>
        <p>Sua opinião é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.</p>
        <p>Você será redirecionado automaticamente em <span id="contador">10</span> segundos...</p>
    </div>
</body>
</html>
