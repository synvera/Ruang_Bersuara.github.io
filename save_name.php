<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db_config.php';

// Accept both JSON and form data
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if (stripos($contentType, 'application/json') !== false) {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    $name = isset($data['name']) ? trim($data['name']) : '';
} else {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
}

if (!$name) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Name is required.']);
    exit;
}

$stmt = $mysqli->prepare('INSERT INTO users (name) VALUES (?)');
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $mysqli->error]);
    exit;
}

$stmt->bind_param('s', $name);
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Name saved.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Insert failed: ' . $stmt->error]);
}

$stmt->close();
$mysqli->close();
?>
