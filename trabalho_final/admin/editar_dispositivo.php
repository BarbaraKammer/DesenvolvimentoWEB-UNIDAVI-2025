<?php
require_once "../functions/db.php";
$conn = db();

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
  header("Location: dispositivos.php");
  exit;
}

$stmt = $conn->prepare("SELECT nome, setor_id FROM dispositivos WHERE id = :id");
$stmt->execute(['id' => $id]);
$d = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$d) {
  header("Location: dispositivos.php");
  exit;
}

$setores = $conn->query("SELECT id, nome FROM setores WHERE status = TRUE ORDER BY nome");

include "header.php";
?>
<h2 class="mb-3">Editar Dispositivo</h2>

<form action="editar_dispositivo_action.php" method="POST">
  <input type="hidden" name="id" value="<?= (int)$id ?>">

  <label>Nome do dispositivo</label>
  <input type="text" name="nome" class="form-control mb-3" value="<?= htmlspecialchars($d['nome']) ?>" required>

  <label>Setor vinculado</label>
  <select name="setor_id" class="form-control mb-3" required>
    <?php foreach ($setores as $s): ?>
      <option value="<?= (int)$s['id'] ?>" <?= $s['id'] == $d['setor_id'] ? 'selected' : '' ?>>
        <?= htmlspecialchars($s['nome']) ?>
      </option>
    <?php endforeach; ?>
  </select>

  <button class="btn btn-primary">Salvar alterações</button>
</form>

<?php include "footer.php"; ?>
