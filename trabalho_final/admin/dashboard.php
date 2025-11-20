<?php include "header.php"; require_once "../functions/db.php"; $conn = db(); ?>

<h2 class="mb-4">Relatório de Avaliações</h2>

<form method="GET" class="row mb-4">
  <div class="col-md-4">
    <select name="setor" class="form-control" onchange="this.form.submit()">
      <option value="">Todos os setores</option>
      <?php foreach ($conn->query("SELECT id, nome FROM setores WHERE status = TRUE ORDER BY nome") as $s) {
        $sel = ($_GET["setor"] ?? "") == $s["id"] ? "selected" : "";
        echo "<option value='{$s['id']}' $sel>{$s['nome']}</option>";
      }?>
    </select>
  </div>
  <div class="col-md-4">
    <select name="disp" class="form-control" onchange="this.form.submit()">
      <option value="">Todos os dispositivos</option>
      <?php
      $sql = "SELECT id, nome FROM dispositivos WHERE status = TRUE";
      if (!empty($_GET["setor"])) $sql .= " AND setor_id = ".$_GET["setor"];
      foreach ($conn->query($sql." ORDER BY nome") as $d) {
        $sel = ($_GET["disp"] ?? "") == $d["id"] ? "selected" : "";
        echo "<option value='{$d['id']}' $sel>{$d['nome']}</option>";
      }?>
    </select>
  </div>
</form>

<!-- gráfico -->
<div class="card p-4 shadow-sm">
  <canvas id="grafico" style="max-height: 380px;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // buscar médias do backend
  fetch("../controllers/get_medias.php?setor=<?= $_GET['setor'] ?? '' ?>&disp=<?= $_GET['disp'] ?? '' ?>")
    .then(res => res.json())
    .then(data => {
      const labels = data.map(l => l.pergunta);
      const valores = data.map(v => Number(v.media));

      new Chart(document.getElementById("grafico"), {
        type: "bar",
        data: {
          labels: labels,
          datasets: [{
            label: "Média por pergunta",
            data: valores,
            backgroundColor: "#5a67d8cc",
            borderRadius: 8
          }]
        },
        options: {
          scales: {
            y: {
              suggestedMin: 0,
              suggestedMax: 10
            }
          }
        }
      });
    });
</script>

<?php include "footer.php"; ?>
