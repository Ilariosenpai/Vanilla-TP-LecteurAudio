<?php

if(

    isset($_POST['nom_playlist']) && !empty($_POST['nom_playlist']) && 
    isset($_FILES['image_playlist']) && !empty($_FILES['image_playlist']) && 
    isset($_POST['musique_Playlist']) && !empty($_POST['musique_Playlist'])     

    


 ) {

    require_once("/laragon/www/exosphp/PDO/Vanilla-TP-LecteurAudio/connexion.php");


    $imageplayName = $_FILES['image_playlist']['name'];
    move_uploaded_file($_FILES['image_playlist']['tmp_name'], "./imageplaylist/$imageplayName");


    $pathplayImage = "./images/$imageplayName";

    $request = $db->prepare("INSERT INTO playlist (nom, image, musique) 
    VALUES (:nom_playlist, :image_playlist, :musique_Playlist)");


$request->execute([

    'nom_playlist' => $_POST['nom_playlist'],
    'musique_Playlist' => $_POST['musique_Playlist'],
    'pochette' => $pathplayImage,
    
]);

 }