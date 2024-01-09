<?php
session_start();

if (isset($_POST['username']) && !empty($_POST['username'])) {
    require_once("/laragon/www/exosphp/PDO/Vanilla-TP-LecteurAudio/connexion.php");

    $existingUser = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
    $existingUser->execute(['pseudo' => $_POST['username']]);

    if ($existingUser->rowCount() > 0) {
       
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['success_message'] = "Connexion réussie.";
        
    } else {
        
        $insertUser = $db->prepare("INSERT INTO user (pseudo) VALUES (:pseudo)");
        $insertUser->execute(['pseudo' => $_POST['username']]);
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['success_message'] = "Pseudo enregistré avec succès.";
    }
}

header('Location: index.php');
exit;
?>