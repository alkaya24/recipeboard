<?php
session_start(); // Startet die PHP-Sitzung
require_once 'config.php'; // Lädt die Konfigurationsdatei

// Werte aus dem Formular abrufen
$title = $_POST['title'];
$category = $_POST['category'];
$duration = $_POST['duration'];
$difficulty = $_POST['difficulty'];
$ingredients = $_POST['ingredients'];
$preparation = $_POST['preparation'];
$user_id = $_SESSION['id']; // ID des angemeldeten Benutzers aus der Session holen

// Bild hochladen
$target_dir = "uploads/"; // Speicherort für hochgeladene Bilder
$image_files = $_FILES["image"]; // Informationen über das hochgeladene Bild
$uploaded_images = []; // Array zum Speichern der Dateinamen hochgeladener Bilder

for ($i = 0; $i < count($image_files["name"]); $i++) { // Schleife für alle hochgeladenen Bilder
    $target_file = $target_dir . basename($image_files["name"][$i]); // Pfad zum Zielverzeichnis und Dateiname
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // Dateityp des Bildes

    if (move_uploaded_file($image_files["tmp_name"][$i], $target_file)) { // Verschiebt das hochgeladene Bild in den Ordner
        $uploaded_images[] = $target_file; // Speichert den Dateinamen des Bildes in das Array
    }
}

$image = json_encode($uploaded_images); // Wandelt das Array in einen JSON-String um

// Daten in die Tabelle "recipes" einfügen
$sql = "INSERT INTO recipes (title, category, duration, difficulty, ingredients, preparation, image, user_id)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssissssi", $title, $category, $duration, $difficulty, $ingredients, $preparation, $image, $user_id);

$result = $stmt->execute(); // Führt die SQL-Anweisung aus und speichert das Ergebnis in $result
if ($result) {
    echo json_encode(['status' => 'Rezept wurde erfolgreich hinzugefügt']); // Gibt eine Erfolgsmeldung im JSON-Format zurück
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; // Gibt eine Erfolgsmeldung im JSON-Format zurück
}

$stmt->close(); // Schließt die SQL-Anweisung
$conn->close(); // Schließt die Datenbankverbindung
?>