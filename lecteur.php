<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Spotyclown</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"></h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">



      <h3>Connexion</h3>
     
     
     <?php
if (isset($_SESSION['username'])) {
    echo '<div style="color: white;">Bienvenue, ' . htmlspecialchars($_SESSION['username']) . '!!</div>';
    echo '<form action="deconnexion.php" method="post"><input type="submit" value="Déconnexion"></form>';
} else {
  ?>

    <form action="login.php" method="post" class="d-flex-column">
        <label for="username">Identifiant:</label>
        <input type="text" name="username" required>
        <button type="submit" >Se connecter</button>
    </form>

    <?php
}
?>
  
        <br><br><br>


               <h3>Ajoutez votre musique : </h3>


               <p><br></p>

                <form method="post" action="process.php" enctype="multipart/form-data" class="d-flex flex-column col-6   " id="formulaire" >


                <label for="pochette">Titre : <input type="text" id="title" name="title">  </label> <br>




<label for="autor">Le nom de l'auteur : <input type="text" id="autor" name="autor">  </label> <br>

<label for="pochette">Votre image : <input type="file" id="pochette" name="pochette"  /> <br>  </label> 

<label for="zik" >Votre fichier MP3 :</label>
<input type="file" id="zik" name="zik"  /> <br>
<input type="submit">
</form>
      </div>
    </div>
  </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="script.js"></script>
    
</body>
</html>