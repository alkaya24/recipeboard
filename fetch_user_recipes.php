<?php
session_start();
require_once 'config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['id'];

$query = "SELECT * FROM recipes WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$recipes = [];
while ($row = $result->fetch_assoc()) {
    $recipes[] = $row;
}

echo json_encode($recipes);
