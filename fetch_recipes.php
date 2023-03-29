<?php
require_once 'config.php';

$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);
$recipes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($recipes);

$conn->close();
?>
