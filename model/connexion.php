<?php
    require('connexion_db.php');

    function messageConnexion($db){
        // RECUPERATION DES DONNEES
        $req = $db->prepare('SELECT id, pseudo, password, active FROM users WHERE pseudo = ?');
        $req->execute(array($_POST['pseudo']));
        $user = $req->fetch();

        // AFFICHAGE DU MESSAGE
        if(!isset($user['pseudo'])){
            echo 'Cet utilisateur n\'existe pas';
        }
        elseif($user['password'] != sha1($_POST['password'])){
            echo'Le mot de passe est incorrect';
        }
        elseif($user['active'] == false){
            echo ('Le  compte '.$user['pseudo'].' est désactivé');
        }
        elseif($user['pseudo'] == $_POST['pseudo'] && $user['password'] == sha1($_POST['password']) AND $user['active'] == true){
            session_start(); // Création de la session
            $_SESSION['id'] = $user['id'];
            $_SESSION['pseudo'] = $user['pseudo'];

            echo ('Bonjour '.$_SESSION['pseudo'].' tu t\'es connecté avec succès !');
        }
        else{
            echo 'Erreur';
        }
        $req->closeCursor();
    }
