<?php

if(

    isset($_POST['title']) && !empty($_POST['title']) && 
    isset($_FILES['pochette']) && !empty($_FILES['pochette']) && 
    isset($_POST['autor']) && !empty($_POST['autor']) &&
    isset($_FILES['zik']) && !empty($_FILES['zik'])

    


 ) {

    require_once("/laragon/www/exosphp/PDO/Vanilla-TP-LecteurAudio/connexion.php");

    

    $imageName = $_FILES['pochette']['name'];
    $musicName = $_FILES['zik']['name'];

   
   
   
    

    move_uploaded_file($_FILES['zik']['tmp_name'], "./musique/$musicName");
    move_uploaded_file($_FILES['pochette']['tmp_name'], "./images/$imageName");
    
    

    $pathMusic = "./musique/$musicName";
    $pathImage = "./images/$imageName";

    

    $request = $db->prepare("INSERT INTO musiques (nom, auteur, pochette, audio) 
    VALUES (:title, :autor, :pochette, :audio)");



$request->execute([

    'title' => $_POST['title'],
    'autor' => $_POST['autor'],
    'pochette' => $pathImage,
    'audio' => $pathMusic
]);


 }

 header('Location: index.php');