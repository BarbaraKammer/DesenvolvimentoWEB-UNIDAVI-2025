<?php
require_once "../functions/db.php";
$conn = db();

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
  header("Location: setores.php");
  exit;
}

$stmt = $conn->prepare("SELECT nome FROM setores WHERE id = :id");
$stmt->execute(['id' => $id]);
$s = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$s) {
  header("Location: setores.php");
  exit;
}

include "header.php";
?>

<h2 class="mb-3">Editar Setor</h2>

<form action="editar_setor_action.php" method="POST">
  <input type="hidden" name="id" value="<?= (int)$id ?>">

  <label>Nome do setor</label>
  <input type="text" name="nome" class="form-control mb-3" value="<?= htmlspecialchars($s['nome']) ?>" required>

  <button class="btn btn-primary">Salvar alterações</button>
</form>

<?php include "footer.php"; ?>
