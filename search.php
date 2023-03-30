<?php
// Einbinden der Konfigurationsdatei
include "config.php";

// Abrufen des Suchbegriffs aus der GET-Variable
$searchTerm = $_GET["searchTerm"];

// Verwendung von Wildcards, um das Suchergebnis zu verfeinern
$searchTerm = "%" . $searchTerm . "%";

// Array für das Ergebnis der Abfrage initialisieren
$resultArray = array();

// SQL-Abfrage zum Abrufen der Rezepte, die den Suchkriterien entsprechen
$sql = "SELECT * FROM recipes WHERE title LIKE ?;";

// Vorbereiten der SQL-Abfrage und Überprüfen, ob sie erfolgreich war
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    // Binden des Suchbegriffs an das SQL-Statement
    mysqli_stmt_bind_param($stmt, "s", $searchTerm);
    // Ausführen der SQL-Abfrage
    mysqli_stmt_execute($stmt);
    // Abrufen des Ergebnisses der Abfrage
    $result = mysqli_stmt_get_result($stmt);

    // Hinzufügen jedes gefundenen Rezepts zum Ergebnis-Array
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($resultArray, $row);
    }

    // Ausgabe des Ergebnis-Arrays als JSON
    echo json_encode($resultArray);
}
?>