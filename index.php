<?php
session_start();



if (isset($_SESSION['success_message'])) {
    echo '<div style="color: green;">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
}
require_once('connexion.php');

$request = $db->query("SELECT * FROM `musiques` ");

$login = $db->query("SELECT * FROM user ");

$musiques = $request->fetchAll();

$requestPlaylists = $db->query("SELECT * FROM playlist");
$playlists = $requestPlaylists->fetchAll();






   

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecteur Audio Révolutionnaire</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<style>
body {
    background:url("./imagedefond/SL-123119-26540-27.jpg");
    background-size: contain;
    
  }
</style>




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

   

    <div id="musiques" class="pt-5 ">

    <h2>Musiques</h2>

    <div class="listemusique" >

    <?php foreach($musiques as $musique){ ?>

      
        
        


        <div id="bloc-image" >
   
   <img class="pochette" src="<?php echo $musique["pochette"] ?>" >
    </a>
<span><?php echo $musique["nom"]?> </span>
      <p class="auteur"> <?php echo $musique["auteur"] ?> </p> 
      
        </div>
    

        
   <?php } ?>
    
    </div>

   </div>


   <div id="playlist" class="pt-5">

<h2>Playlists</h2>
<div class="d-flex justify-content-center pt-5">
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#creerPlaylistModal">
        Créer une Playlist
    </button>
</div>



</div>

<div class="d-flex justify-content-center pt-5">


<div id="musiques" class="pt-5 ">

<h2>Mes Playlists </h2> 

<div class="listemusique" >

    <?php foreach($playlists as $playlist){ ?>

      
        
        


        <div id="bloc-image" >
   
   <img class="pochette" src="<?php echo $playlist["image"] ?>" >
    </a>
<span><?php echo $playlist["nom"]?> </span>
      <p class="auteur"> <?php echo $playlist["autor"] ?> </p> 
      
        </div>
    

        
   <?php } ?>
    
    </div>
</div>
    
    

    
    
    
             
          

        


    <footer>
   
    </footer>
    <form method="post" action="creer_playlist.php" enctype="multipart/form-data" class="d-flex flex-column col-6 " id="formulaire" >
    <div class="modal fade" id="creerPlaylistModal" tabindex="-1" aria-labelledby="creerPlaylistModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
                <h5 class="modal-title" id="creerPlaylistModalLabel">Créer une Playlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            
            <div class="modal-body">

            <label>Musiques disponibles :</label>
<div id="musiquesDisponiblesModal" class="musiquesDisponiblesModal">
<label for="rechercheMusique">Rechercher une musique :</label>
<input type="text" id="rechercheMusique" class="form-control" oninput="filtrerMusiquesDisponibles()">
<br>
<label>Musiques disponibles :</label>
                <div id="musiquesDisponiblesModal" class="musiquesDisponiblesModal">
</div>
<?php foreach ($musiques as $musique) { ?>
    <div id="bloc-image" class="musique-disponible">
        <img class="pochette" src="<?php echo $musique["pochette"] ?>" alt="Pochette de la musique">
        <span><?php echo $musique["nom"] ?> </span>
        <p class="auteur"> <?php echo $musique["auteur"] ?> </p>
        <button class="btn btn-primary">
    <input type="checkbox" class="checkboxMusique" name="musique_Playlist">
</button>
    </div>
<?php } ?>

            </div>
                
                <label for="nomPlaylist">Nom de la Playlist :</label>
                <input type="text" id="nomPlaylist" class="form-control" name="nom_playlist" required>
                <br>

                <label for="imagePlaylist">Image de la Playlist :</label>
                <input type="file" id="imagePlaylist" class="form-control" name="image_playlist" >
                <br>

               

               


            <div class="modal-footer">
                
                <button type="button" name="creer_playlist" class="btn btn-dark" data-bs-dismiss="modal">Créer Playlist</button>

            </div>
        </div>
    </div>
</div>
</form>




</div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
