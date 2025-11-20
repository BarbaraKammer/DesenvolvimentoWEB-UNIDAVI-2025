<?php include "header.php"; require_once "../functions/db.php"; $conn = db(); ?>

<h2 class="mb-3">Dispositivos (Tablets)</h2>

<?php if(isset($_GET["edit_ok"])): ?>
  <div class="alert alert-success">Dispositivo atualizado com sucesso!</div>
<?php endif; ?>

<?php if(isset($_GET["add_ok"])): ?>
  <div class="alert alert-success">Dispositivo adicionado com sucesso!</div>
<?php endif; ?>

<form action="dispositivos_salvar.php" method="POST" class="mb-4">
  <input type="text" name="nome" class="form-control mb-2" placeholder="Nome do dispositivo" required>
  <select name="setor_id" class="form-control mb-2" required>
    <option value="">Selecione o setor</option>
    <?php
      foreach ($conn->query("SELECT id, nome FROM setores WHERE status = TRUE ORDER BY nome") as $s)
          echo "<option value='{$s["id"]}'>{$s["nome"]}</option>";
    ?>
  </select>
  <button class="btn btn-success">Adicionar</button>
</form>

<table class="table table-bordered align-middle">
<thead>
<tr>
  <th>Nome</th>
  <th>Setor</th>
  <th>Status</th>
  <th style="width: 230px;">Ações</th>
</tr>
</thead>
<tbody>
<?php
$q = $conn->query("
SELECT dispositivos.*, setores.nome AS setor
FROM dispositivos
JOIN setores ON setores.id = dispositivos.setor_id
ORDER BY dispositivos.id
");
foreach ($q as $d):
?>
<tr>
  <td><?= htmlspecialchars($d['nome']) ?></td>
  <td><?= htmlspecialchars($d['setor']) ?></td>
  <td><?= $d['status'] ? "Ativo" : "Inativo" ?></td>
  <td>
    <a href="editar_dispositivo.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">✏ Editar</a>
    <a href="dispositivos_toggle.php?id=<?= $d['id'] ?>"
       class="btn <?= $d['status'] ? 'btn-secondary' : 'btn-success' ?> btn-sm">
      <?= $d['status'] ? "Desativar" : "Ativar" ?>
    </a>
  </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php include "footer.php"; ?>
