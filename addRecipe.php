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
    
    <link rel="stylesheet" href="addRecipeStylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
      <title>Rezept hinzufügen</title>
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
                <a class="nav-link active" aria-current="page" href="addRecipe.php" id="addRecipeLink">Rezept hinzufügen</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Entdecken
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Abendessen</a></li>
                  <li><a class="dropdown-item" href="#">Mittagessen</a></li>
                  <li><a class="dropdown-item" href="#">Frühstück</a></li>
                  <li><a class="dropdown-item" href="#">Snacks</a></li>
                  <li><a class="dropdown-item" href="#">Drinks</a></li>
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

<div style="margin: 1em;">
  <h1 style="padding-top: 10px;">Rezept hinzufügen</h1>

  <div style="padding-top: 10px; margin-left: 10%;">
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <form class="mb-3" style="float:left; width: auto; padding-right: 2em;" action="addRecipeAction.php" method="post" enctype="multipart/form-data">
            <label for="exampleFormControlInput1" class="form-label form-control-lg">Titel</label>
            <input type="text" class="form-control" id="titel">
            <label for="exampleFormControlInput1" class="form-label form-control-lg">Kategorie</label>
            <select class="form-select" aria-label="Default select example" id="kategorie">
              <option selected>Auswählen...</option>
              <option value="1">Abendessen</option>
              <option value="2">Mittagessen</option>
              <option value="3">Frühstück</option>
              <option value="4">Snacks</option>
              <option value="5">Getränke</option>
            </select>
            <label for="exampleFormControlInput1" class="form-label form-control-lg">Dauer</label>
            <select class="form-select" aria-label="Default select example" id="dauer">
              <option selected>Auswählen...</option>
              <option value="1">&lt; 10</option>
              <option value="2">&lt; 20</option>
              <option value="3">&lt; 30</option>
              <option value="3">&lt; 40</option>
              <option value="3">&lt; 50</option>
              <option value="3">&lt; 60</option>
              <option value="3">&lt; 90</option>
              <option value="3">&lt; 120</option>
            </select>
            <label for="exampleFormControlInput1" class="form-label form-control-lg">Schwierigkeit</label>
            <select class="form-select" aria-label="Default select example" id="schwierigkeit">
              <option selected>Auswählen...</option>
              <option value="1">Leicht</option>
              <option value="2">Mittel</option>
              <option value="3">Schwer</option>
              <option value="4">Bruder vertrau, mach nicht</option>
            </select>
            <label for="exampleFormControlInput1" class="form-label form-control-lg">Zutaten</label>
            <textarea class="scrollabletextbox" name="note" style="width: 100%; height: 8em;" id="zutaten"></textarea>
            <label for="exampleFormControlInput1" class="form-label form-control-lg">Zubereitung</label>
            <br>
            <textarea class="scrollabletextbox" name="note" style="width: 100%; height: 8em;" id="zubereitung"></textarea>
            <button type="button" class="btn btn-success" id="uploadRecipe" onclick="submitRecipe()" style="margin-top: 15px;">Rezept teilen</button>
          </form>
        </div>
        <div class="col">
          <div>
            <div class="card" style="width: 70%; height: 30em;">
              <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="meal.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="logo2.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="essen1.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              <div class="card-body">
                <h5 class="card-title">Fotos</h5>
                <p class="card-text">Füge Bilder des Gerichts hinzu.</p>
                <div class="mb-3">
                  <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>
              </div>
            </div>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
    crossorigin="anonymous"></script>
</body>

</html>