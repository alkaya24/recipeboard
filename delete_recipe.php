<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['id'])) {
    echo 'Sie sind nicht angemeldet.';
    exit();
}

if (!isset($_POST['recipe_id'])) {
    echo 'Dieses Rezept ist nicht verfügbar.';
    exit();
}

$recipe_id = $_POST['recipe_id'];
$user_id = $_SESSION['id'];

$query = "DELETE FROM recipes WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $recipe_id, $user_id);
$stmt->execute();

echo json_encode(['status' => 'Rezept wurde gelöscht!']);
