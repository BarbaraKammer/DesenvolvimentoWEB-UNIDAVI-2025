<?php
require_once "../functions/db.php";
$data = json_decode(file_get_contents("php://input"), true);
$conn = db();

// valida se setor e dispositivo estão ativos
$check = $conn->prepare("
SELECT setores.status AS setor_ok, dispositivos.status AS disp_ok
FROM dispositivos
JOIN setores ON setores.id = dispositivos.setor_id
WHERE dispositivos.id = :d
");
$check->execute(["d" => $data["dispositivo_id"]]);
$valid = $check->fetch(PDO::FETCH_ASSOC);

if (!$valid["setor_ok"] || !$valid["disp_ok"]) {
    http_response_code(403);
    exit("DISPOSITIVO OU SETOR DESATIVADO");
}

// salva respostas normalmente
foreach ($data["respostas"] as $pid => $nota) {
    if ($nota !== null) {
        $stmt = $conn->prepare("INSERT INTO avaliacoes (setor_id, dispositivo_id, pergunta_id, nota, feedback)
                                VALUES (:s, :d, :p, :n, :f)");
        $stmt->execute([
            "s" => $data["setor_id"],
            "d" => $data["dispositivo_id"],
            "p" => $pid,
            "n" => $nota,
            "f" => $data["feedback"] ?? null
        ]);
    }
}
echo "ok";