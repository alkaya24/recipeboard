<?php
require_once 'config.php';

// Hole die ID des Rezepts aus dem GET-Parameter "id"
$id = $_GET['id'];

// Erstelle eine SQL-Anweisung, um das Rezept mit der gegebenen ID abzurufen
$sql = "SELECT * FROM recipes WHERE id = ?";

// Bereite die SQL-Anweisung vor und binde den Wert der ID daran
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Führe die SQL-Anweisung aus
$stmt->execute();

// Hole das Resultset aus der SQL-Anweisung
$result = $stmt->get_result();

// Lese das erste Ergebnis aus dem Resultset und speichere es als assoziatives Array
$recipe = $result->fetch_assoc();

// Setze den Content-Type der Antwort auf JSON
header('Content-Type: application/json');

// Kodiere das Rezept-Array als JSON und sende es als Antwort
echo json_encode($recipe);

// Schließe die Datenbankverbindung
$conn->close();
?>