<?php
require_once "../functions/db.php";
$conn = db();

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
  header("Location: perguntas.php");
  exit;
}

$stmt = $conn->prepare("SELECT texto FROM perguntas WHERE id = :id");
$stmt->execute(['id' => $id]);
$p = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$p) {
  header("Location: perguntas.php");
  exit;
}

include "header.php";
?>

<h2 class="mb-3">Editar Pergunta</h2>

<form action="editar_pergunta_action.php" method="POST">
  <input type="hidden" name="id" value="<?= (int)$id ?>">

  <label>Pergunta</label>
  <textarea name="texto" class="form-control mb-3" rows="3" required><?= htmlspecialchars($p['texto']) ?></textarea>

  <button class="btn btn-primary">Salvar Alterações</button>
</form>

<?php include "footer.php"; ?>
