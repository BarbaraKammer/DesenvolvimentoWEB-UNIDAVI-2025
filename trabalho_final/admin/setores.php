<?php include "header.php"; require_once "../functions/db.php"; $conn = db(); ?>

<h2 class="mb-3">Setores</h2>

<?php if(isset($_GET["edit_ok"])): ?>
  <div class="alert alert-success">Setor atualizado com sucesso!</div>
<?php endif; ?>

<?php if(isset($_GET["add_ok"])): ?>
  <div class="alert alert-success">Setor adicionado com sucesso!</div>
<?php endif; ?>

<?php if(isset($_GET["toggle_ok"])): ?>
  <div class="alert alert-info">Status do setor alterado com sucesso!</div>
<?php endif; ?>

<form action="setores_salvar.php" method="POST" class="mb-4">
  <input type="text" name="nome" class="form-control mb-2" placeholder="Nome do setor" required>
  <button class="btn btn-success">Adicionar</button>
</form>

<table class="table table-bordered align-middle">
<thead><tr>
  <th>ID</th>
  <th>Setor</th>
  <th>Status</th>
  <th style="width: 230px;">Ações</th>
</tr></thead>
<tbody>
<?php
$q = $conn->query("SELECT * FROM setores ORDER BY id");
foreach ($q as $s):
?>
<tr>
  <td><?= $s['id'] ?></td>
  <td><?= htmlspecialchars($s['nome']) ?></td>
  <td><?= $s['status'] ? "Ativo" : "Inativo" ?></td>
  <td>
    <a href="editar_setor.php?id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">✏ Editar</a>
    <a href="setores_toggle.php?id=<?= $s['id'] ?>" 
       class="btn <?= $s['status'] ? 'btn-secondary' : 'btn-success' ?> btn-sm">
       <?= $s['status'] ? 'Desativar' : 'Ativar' ?>
    </a>
  </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php include "footer.php"; ?>
