<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db_config.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

$name = isset($data['name']) ? trim($data['name']) : '';
$story = isset($data['story']) ? trim($data['story']) : '';

if (!$name || !$story) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Name and story are required.']);
    exit;
}

$stmt = $mysqli->prepare('INSERT INTO submissions (name, story) VALUES (?, ?)');
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $mysqli->error]);
    exit;
}

$stmt->bind_param('ss', $name, $story);
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Saved successfully.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Insert failed: ' . $stmt->error]);
}

$stmt->close();
$mysqli->close();
?>
