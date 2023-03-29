<?php
session_start();
require_once 'config.php';

// Werte aus dem Formular abrufen
$title = $_POST['title'];
$category = $_POST['category'];
$duration = $_POST['duration'];
$difficulty = $_POST['difficulty'];
$ingredients = $_POST['ingredients'];
$preparation = $_POST['preparation'];
$user_id = $_SESSION['id'];

// Bild hochladen
$target_dir = "uploads/";
$image_files = $_FILES["image"];
$uploaded_images = [];

for ($i = 0; $i < count($image_files["name"]); $i++) {
    $target_file = $target_dir . basename($image_files["name"][$i]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($image_files["tmp_name"][$i], $target_file)) {
        $uploaded_images[] = $target_file;
    }
}

$image = json_encode($uploaded_images);

// Daten in die Tabelle "recipes" einfügen
$sql = "INSERT INTO recipes (title, category, duration, difficulty, ingredients, preparation, image, user_id)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssissssi", $title, $category, $duration, $difficulty, $ingredients, $preparation, $image, $user_id);

$result = $stmt->execute();
if ($result) {
    echo "Rezept wurde erfolgreich hinzugefügt";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
