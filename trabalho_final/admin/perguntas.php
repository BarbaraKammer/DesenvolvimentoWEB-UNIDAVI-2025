<?php include "header.php"; require_once "../functions/db.php"; $conn = db(); ?>

<h2 class="mb-3">Perguntas</h2>

<?php if(isset($_GET["edit_ok"])): ?>
  <div class="alert alert-success">Pergunta atualizada com sucesso!</div>
<?php endif; ?>

<?php if(isset($_GET["toggle_ok"])): ?>
  <div class="alert alert-info">Status da pergunta alterado com sucesso!</div>
<?php endif; ?>

<?php if(isset($_GET["add_ok"])): ?>
  <div class="alert alert-success">Pergunta adicionada com sucesso!</div>
<?php endif; ?>

<form action="perguntas_salvar.php" method="POST" class="mb-4">
  <input type="text" name="texto" class="form-control mb-2" placeholder="Texto da pergunta" required>
  <button class="btn btn-success">Adicionar</button>
</form>

<table class="table table-bordered align-middle">
<thead>
<tr>
  <th>Pergunta</th>
  <th>Status</th>
  <th width="220px">Ações</th>
</tr>
</thead>
<tbody>
<?php
$q = $conn->query("SELECT * FROM perguntas ORDER BY id DESC");
foreach ($q as $p):
?>
<tr>
  <td><?= htmlspecialchars($p['texto']) ?></td>
  <td><?= $p['status'] ? "Ativa" : "Inativa" ?></td>
  <td>
    <a href="editar_pergunta.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">✏ Editar</a>
    <a href="perguntas_toggle.php?id=<?= $p['id'] ?>" class="btn <?= $p['status'] ? 'btn-secondary' : 'btn-success' ?> btn-sm">
      <?= $p['status'] ? "Desativar" : "Ativar" ?>
    </a>
  </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php include "footer.php"; ?>
