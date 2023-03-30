<?php
require_once 'config.php';

// Abfrage der Rezepte in der Datenbank
$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);
$recipes = [];

// Schleife um alle Rezepte in ein Array zu speichern
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
}

// Rückgabe der Rezepte im JSON-Format
header('Content-Type: application/json');
echo json_encode($recipes);

$conn->close();
?>