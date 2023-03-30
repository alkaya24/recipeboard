<?php
session_start();
require_once 'config.php';

// Überprüfen, ob das Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

    // SQL-Abfrage, um Benutzerdaten abzurufen
    $sql = "SELECT id, vorname, nachname, email, password FROM users WHERE email = ?";

    // Vorbereiten der SQL-Abfrage
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Ausführen der SQL-Abfrage
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            // Überprüfen, ob ein Benutzer mit der angegebenen E-Mail-Adresse gefunden wurde
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $vorname, $nachname, $email, $hashed_password);

                // Abrufen der Benutzerdaten
                if (mysqli_stmt_fetch($stmt)) {
                    // Überprüfen des eingegebenen Passworts
                    if (password_verify($password, $hashed_password)) {
                        // Anmeldung erfolgreich
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['id'] = $id;
                        $_SESSION['vorname'] = $vorname;
                        $_SESSION['nachname'] = $nachname;
                        $_SESSION['email'] = $email;
                        echo json_encode(['status' => 'Erfolgreich angemeldet!']);
                        header("Location: index.html");
                    } else {
                        // Fehler bei der Passwortüberprüfung
                        echo json_encode(['status' => 'error', 'message' => 'Falsches Passwort.']);
                    }
                }
            } else {
                // Kein Benutzer mit der angegebenen E-Mail-Adresse gefunden
                echo "Kein Benutzer mit dieser E-Mail gefunden.";
            }
        } else {
            // Fehler beim Ausführen der SQL-Abfrage
            echo "Fehler bei der Anmeldung. Bitte versuchen Sie es später erneut.";
        }
        // Schließen des Statements
        mysqli_stmt_close($stmt);
    }
    // Schließen der Verbindung zur Datenbank
    mysqli_close($conn);
}
?>