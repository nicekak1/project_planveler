<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $data = $_POST['value'] ?? 'empty';
    echo json_encode(["message" => "Undocumented endpoint called", "value" => $data]);
    http_response_code(200);
}
?>
