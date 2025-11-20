<?php
require_once "../functions/db.php";
$conn = db();

$setor = $_GET["setor"] ?? null;
$device = $_GET["device"] ?? null;

$sql = "
  SELECT p.texto AS pergunta, ROUND(AVG(a.nota), 1) AS media
  FROM avaliacoes a
  JOIN perguntas p ON p.id = a.pergunta_id
  WHERE 1 = 1
";

$params = [];

if ($setor) {
  $sql .= " AND a.setor_id = :setor";
  $params["setor"] = $setor;
}
if ($device) {
  $sql .= " AND a.dispositivo_id = :device";
  $params["device"] = $device;
}

$sql .= " GROUP BY p.id, p.texto ORDER BY p.id";
$stmt = $conn->prepare($sql);
$stmt->execute($params);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
