<?php
include "config.php";

$searchTerm = $_GET["searchTerm"];
$searchTerm = "%" . $searchTerm . "%";
$resultArray = array();

$sql = "SELECT * FROM recipes WHERE title LIKE ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($stmt, "s", $searchTerm);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($resultArray, $row);
    }

    echo json_encode($resultArray);
}
?>
