<?php
require_once "config.php";

$searchTerm = $_GET['searchTerm'];

$sql = "SELECT * FROM recipes WHERE title LIKE :searchTerm";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
$stmt->execute();

$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($recipes);
?>
