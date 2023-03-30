<?php
session_start();
require_once 'config.php';

header('Content-Type: application/json');

// Überprüfen, ob ein Benutzer angemeldet ist
if (!isset($_SESSION['id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$user_id = $_SESSION['id'];

// Abfrage, um alle Rezepte des angemeldeten Benutzers abzurufen
$query = "SELECT * FROM recipes WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Sammeln aller Rezepte in ein Array
$recipes = [];
while ($row = $result->fetch_assoc()) {
    $recipes[] = $row;
}

// Rückgabe der Rezepte als JSON
echo json_encode($recipes);
?>