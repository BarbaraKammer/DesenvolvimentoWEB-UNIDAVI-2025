<?php
include "header.php";
require_once "../functions/db.php";
$conn = db();

// Sanitização
$setor = isset($_GET["setor"]) && is_numeric($_GET["setor"]) ? (int)$_GET["setor"] : null;
$disp  = isset($_GET["disp"]) && is_numeric($_GET["disp"]) ? (int)$_GET["disp"] : null;
?>

<h2 class="mb-4">Relatório de Avaliações</h2>

<form method="GET" class="row mb-4">
  <div class="col-md-4">
    <select name="setor" class="form-control" onchange="this.form.submit()">
      <option value="">Todos os setores</option>
      <?php
      $stmt = $conn->query("SELECT id, nome FROM setores WHERE status = TRUE ORDER BY nome");
      foreach ($stmt as $s) {
        $sel = ($setor && $setor == $s["id"]) ? "selected" : "";
        echo "<option value='{$s['id']}' $sel>" . htmlspecialchars($s['nome']) . "</option>";
      }
      ?>
    </select>
  </div>

  <div class="col-md-4">
    <select name="disp" class="form-control" onchange="this.form.submit()">
      <option value="">Todos os dispositivos</option>
      <?php
      $query = "SELECT id, nome FROM dispositivos WHERE status = TRUE";
      $params = [];

      if ($setor) {
        $query .= " AND setor_id = :s";
        $params["s"] = $setor;
      }

      $stmt = $conn->prepare($query . " ORDER BY nome");
      $stmt->execute($params);

      foreach ($stmt as $d) {
        $sel = ($disp && $disp == $d["id"]) ? "selected" : "";
        echo "<option value='{$d['id']}' $sel>" . htmlspecialchars($d['nome']) . "</option>";
      }
      ?>
    </select>
  </div>
</form>

<div class="card p-4 shadow-sm">
  <canvas id="grafico" style="max-height: 380px;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch("../controllers/get_medias.php?setor=<?= $setor ?? '' ?>&device=<?= $disp ?? '' ?>")
  .then(res => res.json())
  .then(data => {
    const labels = data.map(l => l.pergunta);
    const valores = data.map(v => Number(v.media));

    new Chart(document.getElementById("grafico"), {
      type: "bar",
      data: {
        labels,
        datasets: [{
          label: "Média por pergunta",
          data: valores,
          backgroundColor: "#5a67d8cc",
          borderRadius: 8
        }]
      },
      options: {
        scales: { y: { suggestedMin: 0, suggestedMax: 10 } }
      }
    });
  });
</script>

<?php include "footer.php"; ?>
