<?php
// Starten der PHP-Sitzung
session_start();

// Einbinden der Konfigurationsdatei, die die Verbindung zur Datenbank herstellt
require_once 'config.php';

// Überprüfen, ob der Benutzer angemeldet ist
if (!isset($_SESSION['id'])) {
    // Wenn der Benutzer nicht angemeldet ist, wird eine Fehlermeldung ausgegeben und das Skript wird beendet
    echo 'Sie sind nicht angemeldet.';
    exit();
}

// Überprüfen, ob eine Rezept-ID übergeben wurde
if (!isset($_POST['recipe_id'])) {
    // Wenn keine Rezept-ID übergeben wurde, wird eine Fehlermeldung ausgegeben und das Skript wird beendet
    echo 'Dieses Rezept ist nicht verfügbar.';
    exit();
}

// Holen der Rezept-ID aus dem POST-Array und der Benutzer-ID aus der Sitzung
$recipe_id = $_POST['recipe_id'];
$user_id = $_SESSION['id'];

// Vorbereiten der SQL-Abfrage zum Löschen des Rezepts aus der Datenbank
$query = "DELETE FROM recipes WHERE id = ? AND user_id = ?";

// Vorbereiten des SQL-Statements
$stmt = $conn->prepare($query);

// Binden der Parameter an das SQL-Statement
$stmt->bind_param("ii", $recipe_id, $user_id);

// Ausführen des SQL-Statements
$stmt->execute();

// Ausgabe einer Erfolgsmeldung
echo "Rezept wurde gelöscht!";
?>