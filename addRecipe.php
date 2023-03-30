<?php
// Starte eine neue Session
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Importiere die jQuery Bibliothek -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <!-- Verweis auf die main.js-Datei -->
  <script src="main.js"></script>
  <!-- Importiere das Stylesheet für die Seite -->
  <link rel="stylesheet" href="addRecipeStylesheet.css">
  <!-- Importiere das Bootstrap Stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- Setze den Titel der Seite -->
  <title>Rezept hinzufügen</title>
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg bg-success">
    <div class="container-fluid">
      <!-- Logo und Link zur Startseite -->
      <a class="navbar-brand" href="index.html">
        <img src="logo2.png" alt="Bootstrap" width="30" height="30">
      </a>
      <!-- Button zum Anzeigen der Links auf kleineren Bildschirmen -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Liste der Links in der Navigation Bar -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <!-- Button zum Anzeigen des Login-Modals -->
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Login</a>
            <!-- Button zum Ausloggen eines angemeldeten Benutzers -->
            <a class="nav-link" id="logoutButton" onclick="logoutUser();" href="#" style="display:none;">Logout</a>
            <!-- Login Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <form class="modal-content" method="post" action="login.php">
                  <div class="modal-header">
                    <!-- Titel des Modals -->
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                    <!-- Button zum Schließen des Modals -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- E-Mail Eingabefeld -->
                    <input type="text" id="login-email" placeholder="E-Mail"> </input>
                    <br>
                    <!-- Passwort Eingabefeld -->
                    <input type="password" id="login-password" placeholder="Password"> </input>
                  </div>
                  <!-- Modal Fußzeile -->
                  <div class="modal-footer">
                    <!-- Link zur Registrierungsseite -->
                    <a href="signUp.php" align="left">Noch kein Benutzeraccount?</a>
                    <!-- Button zum Schließen des Modals -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                    <!-- Button zum Einloggen -->
                    <button type="button" id="login-button" class="btn btn-success">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </li>
          <!-- Link zu "Meine Rezepte" -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="meineRezepte.php" id="myRecipesLink">Meine Rezepte</a>
          </li>
          <!-- Link zu "Rezept hinzufügen" -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="addRecipe.php" id="addRecipeLink">Rezept hinzufügen</a>
          </li>
          <!-- Dropdown-Menü "Entdecken" -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Entdecken
            </a>
            <!-- Dropdown-Optionen für "Entdecken" -->
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.html#Abendessen">Abendessen</a></li>
              <li><a class="dropdown-item" href="index.html#Mittagessen">Mittagessen</a></li>
              <li><a class="dropdown-item" href="index.html#Frühstück">Frühstück</a></li>
              <li><a class="dropdown-item" href="index.html#Snacks">Snacks</a></li>
              <li><a class="dropdown-item" href="index.html#Getränke">Getränke</a></li>
            </ul>
          </li>
        </ul>
        <!-- Eingabefeld für die Suchfunktion -->
        <form class="d-flex" role="search">
        <input type="text" class="form-control" id="searchBar" oninput="searchRecipes()"
            placeholder="Suche nach Rezepten...">
          <button type="button" class="btn btn-success">Suchen</button>
        </form>
      </div>
    </div>
  </nav>
  <div style="margin: 1em;">
    <h1 style="padding-top: 10px;">Rezept hinzufügen</h1>

    <div style="padding-top: 10px; margin-left: 10%;">
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <!-- Formular für das Hinzufügen von Rezepten -->
            <form class="mb-3" style="float:left; width: auto; padding-right: 2em;" action="addRecipeAction.php"
              method="post" enctype="multipart/form-data">
              <!-- Eingabefeld für den Titel -->
              <label for="exampleFormControlInput1" class="form-label form-control-lg">Titel</label>
              <input type="text" class="form-control" id="titel">
              <!-- Dropdown für die Kategorie -->
              <label for="exampleFormControlInput1" class="form-label form-control-lg">Kategorie</label>
              <select class="form-select" aria-label="Default select example" id="kategorie">
                <option selected>Auswählen...</option>
                <option value="1">Abendessen</option>
                <option value="2">Mittagessen</option>
                <option value="3">Frühstück</option>
                <option value="4">Snacks</option>
                <option value="5">Getränke</option>
              </select>
              <!-- Dropdown für die Dauer -->
              <label for="exampleFormControlInput1" class="form-label form-control-lg">Dauer</label>
              <select class="form-select" aria-label="Default select example" id="dauer">
                <option selected>Auswählen...</option>
                <option value="1">&lt; 10</option>
                <option value="2">&lt; 20</option>
                <option value="3">&lt; 30</option>
                <option value="4">&lt; 40</option>
                <option value="5">&lt; 50</option>
                <option value="6">&lt; 60</option>
                <option value="7">&lt; 90</option>
                <option value="8">&lt; 120</option>
              </select>
              <!-- Dropdown für die Schwierigkeit -->
              <label for="exampleFormControlInput1" class="form-label form-control-lg">Schwierigkeit</label>
              <select class="form-select" aria-label="Default select example" id="schwierigkeit">
                <option selected>Auswählen...</option>
                <option value="1">Leicht</option>
                <option value="2">Mittel</option>
                <option value="3">Schwer</option>
                <option value="4">Bruder vertrau, mach nicht</option>
              </select>
              <!-- Textarea für die Zutaten des Rezepts. -->
              <label for="exampleFormControlInput1" class="form-label form-control-lg">Zutaten</label>
              <textarea class="scrollabletextbox" name="note" style="width: 100%; height: 8em;" id="zutaten"></textarea>
              <!-- Textarea für die Zubereitung des Rezepts. -->
              <label for="exampleFormControlInput1" class="form-label form-control-lg">Zubereitung</label>
              <br>
              <textarea class="scrollabletextbox" name="note" style="width: 100%; height: 8em;"
                id="zubereitung"></textarea>
              <!-- Button zum Teilen des Rezepts -->
              <button type="button" class="btn btn-success" id="uploadRecipe" onclick="submitRecipe()"
                style="margin-top: 15px;">Rezept teilen</button>
            </form>
          </div>
          <div class="col">
            <div>
              <div class="card" style="width: 70%; height: 30em;">
                <div>
                  <div>
                    <div>
                      <!-- Bild für das Rezept. -->
                      <img src="meal.png" class="d-block w-100" alt="...">
                    </div>

                  </div>
                  <div class="card-body">
                    <!-- Titel für das Fotoelement -->
                    <h5 class="card-title">Fotos</h5>
                    <!-- Beschreibung für das Fotoelement -->
                    <p class="card-text">Füge Bilder des Gerichts hinzu.</p>
                    <div class="mb-3">
                      <!-- Dateieingabefeld für die Bilder des Gerichts -->
                      <input class="form-control" type="file" id="formFileMultiple" multiple accept="image/*"
                        onchange="validateImageCount(this)">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Verweis auf die Bootstrap-Bundle-Datei -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"></script>
</body>

</html>