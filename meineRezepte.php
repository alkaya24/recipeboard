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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="meineRezepte.js"></script>
    <link rel="stylesheet" href="meineRezepte.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

      <!-- 1. Owl Carousel Min.css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" 
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!-- 2. Owl Carousel Theme Min .css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" 
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
      <title>Meine Rezepte</title>
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

  <div id="div1">
    <h1>Meine Rezepte:   </h1>

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-box clearfix">
            <div class="table-responsive">
              <table class="table user-list">
                <thead>
                  <tr>
                    <th><span>Titel</span></th>
                    <th class="text-center"><span>Kategorie</span></th>
                    <th class="text-center"><span>Schwierigkeit</span></th>
                    <th class="text-center"><span>Dauer</span></th>
                    <th class="text-center">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  
                 
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>
      </div>

  </div>
  </body>