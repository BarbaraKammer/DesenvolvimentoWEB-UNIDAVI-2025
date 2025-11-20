<?php
require_once "../functions/db.php";
$conn = db();
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT nome FROM setores WHERE id = :id");
$stmt->execute(['id' => $id]);
$s = $stmt->fetch(PDO::FETCH_ASSOC);

include "header.php";
?>

<h2 class="mb-3">Editar Setor</h2>

<form action="editar_setor_action.php" method="POST">
  <input type="hidden" name="id" value="<?= $id ?>">

  <label>Nome do setor</label>
  <input type="text" name="nome" class="form-control mb-3" value="<?= htmlspecialchars($s['nome']) ?>" required>

  <button class="btn btn-primary">Salvar alterações</button>
</form>

<?php include "footer.php"; ?>
