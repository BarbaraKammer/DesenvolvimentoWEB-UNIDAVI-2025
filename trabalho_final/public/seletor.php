<?php require_once "../functions/db.php"; $conn = db(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Iniciar Avaliação</title>
<link rel="stylesheet" href="../assets/css/seletor.css">
</head>
<body>

<div class="card">
  <h2>Iniciar Avaliação</h2>

  <form action="avaliacao.php" method="GET">
    <label>Selecione o dispositivo</label>
    <select name="device" required>
      <option value="">Selecione...</option>
      <?php foreach ($conn->query("SELECT id, nome FROM dispositivos WHERE status = TRUE ORDER BY nome") as $d): ?>
        <option value="<?= $d['id'] ?>"><?= $d['nome'] ?></option>
      <?php endforeach; ?>
    </select>

    <button type="submit">Iniciar</button>

  </form>
</div>

</body>
</html>
