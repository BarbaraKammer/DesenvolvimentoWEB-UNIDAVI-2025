<?php
require_once "../functions/db.php";
$conn = db();

$raw  = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!is_array($data)) {
    http_response_code(400);
    exit("JSON inválido");
}

$setor_id       = isset($data["setor_id"])       && is_numeric($data["setor_id"])       ? (int)$data["setor_id"]       : null;
$dispositivo_id = isset($data["dispositivo_id"]) && is_numeric($data["dispositivo_id"]) ? (int)$data["dispositivo_id"] : null;
$respostas      = isset($data["respostas"]) && is_array($data["respostas"]) ? $data["respostas"] : [];
$feedback       = isset($data["feedback"]) ? trim($data["feedback"]) : null;

if ($setor_id === null || $dispositivo_id === null) {
    http_response_code(400);
    exit("SETOR OU DISPOSITIVO INVÁLIDOS");
}

if ($feedback === '') {
    $feedback = null;
}

// valida se setor e dispositivo estão ativos
$check = $conn->prepare("
SELECT setores.status AS setor_ok, dispositivos.status AS disp_ok
FROM dispositivos
JOIN setores ON setores.id = dispositivos.setor_id
WHERE dispositivos.id = :d
");
$check->execute(["d" => $dispositivo_id]);
$valid = $check->fetch(PDO::FETCH_ASSOC);

if (!$valid || !$valid["setor_ok"] || !$valid["disp_ok"]) {
    http_response_code(403);
    exit("DISPOSITIVO OU SETOR DESATIVADO");
}

// salva respostas normalmente
$stmtInsert = $conn->prepare("
    INSERT INTO avaliacoes (setor_id, dispositivo_id, pergunta_id, nota, feedback)
    VALUES (:s, :d, :p, :n, :f)
");

foreach ($respostas as $pid => $nota) {

    if ($nota === null || $nota === '') {
        continue;
    }

    if (!is_numeric($pid) || !is_numeric($nota)) {
        continue;
    }

    $pid  = (int)$pid;
    $nota = (int)$nota;

    if ($nota < 0 || $nota > 10) {
        continue;
    }

    $stmtInsert->execute([
        "s" => $setor_id,
        "d" => $dispositivo_id,
        "p" => $pid,
        "n" => $nota,
        "f" => $feedback
    ]);
}

echo "ok";
