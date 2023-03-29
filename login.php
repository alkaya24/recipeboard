<?php
  session_start();
  require_once 'config.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

    $sql = "SELECT id, vorname, nachname, email, password FROM users WHERE email = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
    
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
    
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $vorname, $nachname, $email, $hashed_password);
    
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['id'] = $id;
                        $_SESSION['vorname'] = $vorname;
                        $_SESSION['nachname'] = $nachname;
                        $_SESSION['email'] = $email;
    
                        echo "Erfolgreich angemeldet.";
                    } else {
                        echo "Falsches Passwort.";
                    }
                }
            } else {
                echo "Kein Benutzer mit dieser E-Mail gefunden.";
            }
        } else {
            echo "Fehler bei der Anmeldung. Bitte versuchen Sie es später erneut.";
        }
    
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
    }
?>
