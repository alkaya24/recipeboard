<?php
  session_start();
  require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" href="signUpStylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <title>Sign Up for MeinRezept</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-success">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">
        <img src="logo2.png" alt="Bootstrap" width="30" height="30">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Login</a>
            <a class="nav-link" id="logoutButton" onclick="logoutUser();" href="#" style="display:none;">Logout</a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form class="modal-content" method="post" action="login.php">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="text" id="login-email" placeholder="E-Mail"> </input>
                    <br>
                    <input type="password" id="login-password" placeholder="Password"> </input>
                  </div>
                  <div class="modal-footer">
                    <a href="signUp.php" align="left">Noch kein Benutzeraccount?</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                    <button type="button" id="login-button" class="btn btn-success">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="meineRezepte.php" id="myRecipesLink">Meine Rezepte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="addRecipe.php" id="addRecipeLink">Rezept hinzufügen</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Entdecken
            </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.html#Abendessen">Abendessen</a></li>
          <li><a class="dropdown-item" href="index.html#Mittagessen">Mittagessen</a></li>
          <li><a class="dropdown-item" href="index.html#Frühstück">Frühstück</a></li>
          <li><a class="dropdown-item" href="index.html#Snacks">Snacks</a></li>
          <li><a class="dropdown-item" href="index.html#Getränke">Getränke</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Suchen" aria-label="Search">
          <button type="button" class="btn btn-success">Suchen</button>
        </form>
      </div>
    </div>
  </nav>

      
      <div style="margin: 1em; margin-left: 15%;">
      <h2>Lege dein Profil für MeinRezept.de an um selbst Rezepte zu teilen!</h1>

       <div style="padding-top: 10px;">
          <div class="container text-center">
            <div class="row">
              <div class="col">

                <form method="post" action="register.php" enctype="multipart/form-data" class="mb-3" style="float:left; width:auto; padding-right: 2em;">
                  <label for="exampleFormControlInput1" class="form-label form-control-lg">Vorname</label>
                  <input type="text" class="form-control" id="firstname">
                  <label for="exampleFormControlInput1" class="form-label form-control-lg">Nachname</label>
                  <input type="text" class="form-control" id="lastname">
                  <label for="exampleFormControlInput1" class="form-label form-control-lg">E-Mail Adresse</label>
                  <input type="email" class="form-control" id="register-email" placeholder="name@example.com">
                  <label for="exampleFormControlInput1" class="form-label form-control-lg">Passwort</label>
                  <input type="password" class="form-control" id="register-password">
                  <label for="exampleFormControlInput1" class="form-label form-control-lg">Passwort wiederholen</label>
                  <input type="password" class="form-control" id="confirm-password">
                  <button type="button" id="register-button" class="btn btn-success" style="margin-top: 15px;">Konto anlegen</button>
                </form>
              </div>

            <div class="col">
              <div>
                  <div class="card" style="width: 17rem;">
                      <img src="User.png" class="card-img-top" alt="Profilbild">
                      <div class="card-body">
                          <h5 class="card-title">Profilbild</h5>
                          <p class="card-text">Füge ein Profilbild hinzu, damit dich andere Nutzer erkennen und sich das Erlebnis dieser Webseite persönlicher und familärer anfühlt.</p>
                          <div class="mb-3">
                              <input class="form-control" type="file" id="formFile">
                          </div>
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
</html>