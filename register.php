<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Passwort verschlüsseln
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Überprüfen, ob der Benutzername oder die E-Mail-Adresse bereits vorhanden sind
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Wenn ein Eintrag bereits vorhanden ist, geben wir eine Fehlermeldung aus und beenden die Ausführung des Skripts
        echo "Ein Benutzer mit diesem Benutzernamen oder dieser E-Mail-Adresse existiert bereits.";
    } else {
        // Wenn kein Eintrag gefunden wurde, fügen wir die neuen Daten in die Datenbank ein
        $sql = "INSERT INTO users (vorname, nachname, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashed_password);
        $result = $stmt->execute();
    
        if ($result) {
            echo json_encode(['status' => 'Erfolgreich registriert! Sie können sich jetzt anmelden.']);
        } else {
            echo "Fehler: " . $sql . "<br>" . $conn->error;
        }
    }
}
    $stmt->close();
    $conn->close();

    ?>
