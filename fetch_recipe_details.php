<?php
require_once 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM recipes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$recipe = $result->fetch_assoc();

header('Content-Type: application/json');
echo json_encode($recipe);

$conn->close();
?>
