<?php
require_once "../functions/db.php";
$conn = db();
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT nome, setor_id FROM dispositivos WHERE id = :id");
$stmt->execute(['id' => $id]);
$d = $stmt->fetch(PDO::FETCH_ASSOC);

$setores = $conn->query("SELECT id, nome FROM setores WHERE status = TRUE ORDER BY nome");

include "header.php";
?>
<h2 class="mb-3">Editar Dispositivo</h2>

<form action="editar_dispositivo_action.php" method="POST">
  <input type="hidden" name="id" value="<?= $id ?>">

  <label>Nome do dispositivo</label>
  <input type="text" name="nome" class="form-control mb-3" value="<?= htmlspecialchars($d['nome']) ?>" required>

  <label>Setor vinculado</label>
  <select name="setor_id" class="form-control mb-3" required>
    <?php foreach ($setores as $s): ?>
      <option value="<?= $s['id'] ?>" <?= $s['id'] == $d['setor_id'] ? 'selected' : '' ?>>
        <?= $s['nome'] ?>
      </option>
    <?php endforeach; ?>
  </select>

  <button class="btn btn-primary">Salvar alterações</button>
</form>

<?php include "footer.php"; ?>
