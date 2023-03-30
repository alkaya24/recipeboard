<?php
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
  <!-- Verweis auf die meineRezepte.js-Datei -->
  <script src="meineRezepte.js"></script>
  <!-- Importiere das Stylesheet für die Seite -->
  <link rel="stylesheet" href="meineRezepte.css">
  <!-- Importiere das Bootstrap Stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Setze den Titel der Seite -->
  <title>Meine Rezepte</title>
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

  <div id="div1">
    <!-- Überschrift für die Seite -->
    <h1>Meine Rezepte: </h1>

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-box clearfix">
            <div class="table-responsive">
              <!-- Tabelle für die Anzeige der Rezepte -->
              <table class="table user-list">
                <thead>
                  <tr>
                    <!-- Spaltenüberschrift für den Titel -->
                    <th class="text-center"><span>Titel</span></th>
                    <!-- Spaltenüberschrift für die Kategorie -->
                    <th class="text-center"><span>Kategorie</span></th>
                    <!-- Spaltenüberschrift für die Schwierigkeit -->
                    <th class="text-center"><span>Schwierigkeit</span></th>
                    <!-- Spaltenüberschrift für die Dauer -->
                    <th class="text-center"><span>Dauer</span></th>
                    <!-- Spaltenüberschrift für das Löschen -->
                    <th class="text-center"><span>Löschen</span></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Hier werden die Rezepte geladen-->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>