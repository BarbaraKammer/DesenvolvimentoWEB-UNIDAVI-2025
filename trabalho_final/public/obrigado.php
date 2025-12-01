<?php
$device = isset($_GET['device']) && is_numeric($_GET['device']) ? (int)$_GET['device'] : null;
$setor  = isset($_GET['setor'])  && is_numeric($_GET['setor'])  ? (int)$_GET['setor']  : null;

if (!$device || !$setor) {
  header("Location: seletor.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Obrigado!</title>
<link rel="stylesheet" href="../assets/css/obrigado.css">
</head>
<body>

<div class="tela-final">
  <div class="card-final">
    <h1>Obrigado pela sua avaliação! 🎉</h1>
    <p>Sua opinião é muito importante para que possamos melhorar continuamente nossos serviços.</p>
    <p class="contador">
      Retornando para a tela inicial em <span id="timer">10</span> segundos...
    </p>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  let tempo = 10;
  const el = document.getElementById("timer");

  const device = <?= (int)$device ?>;
  const setor  = <?= (int)$setor ?>;

  const interval = setInterval(() => {
    tempo--;
    el.textContent = tempo;

    if (tempo <= 0) {
      clearInterval(interval);
      window.location.href = `avaliacao.php?device=${device}&setor=${setor}`;
    }
  }, 1000);
});
</script>

</body>
</html>
