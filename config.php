<?php
// Definition der Konstanten für die Datenbankverbindung
define('DB_SERVER', 'db5012468103.hosting-data.io');
define('DB_PORT', '3306');
define('DB_USERNAME', 'dbu3851606');
define('DB_PASSWORD', 'IronMan_TonyStark');
define('DB_NAME', 'dbs10483263');

// Herstellen einer Verbindung zur Datenbank mit den oben definierten Konstanten
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// Überprüfen, ob eine Verbindung hergestellt werden konnte
if (!$conn) {
  // Wenn keine Verbindung hergestellt werden konnte, wird eine Fehlermeldung ausgegeben und das Skript wird beendet
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>