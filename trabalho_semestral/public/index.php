<?php
session_start();
require_once '../src/funcoes.php';

// Se não houver pergunta atual, começa da 1ª
if (!isset($_SESSION['pergunta_atual'])) {
    $_SESSION['pergunta_atual'] = 1;
}

$pergunta = carregarPerguntaAtual($_SESSION['pergunta_atual']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliação</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Biblioteca Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    <div class="container animate__animated animate__fadeInUp">
        <h2><?php echo htmlspecialchars($pergunta['texto']); ?></h2>
        <div class="legenda-escala emoji">
            <span>😠 0 (MUITO INSATISFEITO)</span>
            <span>😐 5 (NEUTRO)</span>
            <span>😄 10 (COMPLETAMENTE SATISFEITO)</span>
        </div>
        <form action="../src/respostas.php" method="POST">
            <input type="hidden" name="id_pergunta" value="<?php echo $pergunta['id']; ?>">

            <div class="escala">
                <?php for ($i = 0; $i <= 10; $i++): ?>
                    <label class="nivel-<?php echo $i; ?>">
                        <input type="radio" name="resposta" value="<?php echo $i; ?>" required>
                        <span><?php echo $i; ?></span>
                    </label>
                <?php endfor; ?>
            </div>

            <?php if ($pergunta['id'] == 5): ?>
                <textarea name="feedback" placeholder="Deixe um comentário (opcional)"></textarea>
            <?php endif; ?>

            <button type="submit" class="animate__animated animate__bounceIn">Próximo</button>
        </form>

        <p class="anonimo">
            Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.
        </p>
    </div>
<script src="js/script.js"></script>
</body>
</html>
