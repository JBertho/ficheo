<?php
    require("connexion_db.php");

    function messageInscription($db){
        // RECUPERATION DES DONNEES
        $req = $db->prepare('SELECT * FROM users');
        $req->execute(array($_POST['pseudo']));
        while($user = $req->fetch()){
            if($user['pseudo'] == $_POST['pseudo']){
                $user_exist = true;
            }
            if($user['email'] == $_POST['email']){
                $email_exist = true;
            }
        }
        $req->closeCursor();

        // AFFICHAGE DU MESSAGE
        if(isset($user_exist)){
            echo 'Ce pseudo est déjà utilisé';
        }
        elseif(isset($email_exist)){
            echo 'Cette adresse email est déjà utilisée';
        }
        elseif($_POST['password'] != $_POST['confirm_password']){
            echo'La confirmation du mot de passe n\'est pas correcte';
        }
        elseif($_POST['pseudo'] < 12 && $_POST['password'] < 12){
            echo 'Vous avez été inscris ! Un email vous a été envoyé afin d\'activer votre compte';
            $password_hash = sha1($_POST['password']);

            $req = $db->prepare('INSERT INTO users(pseudo, password, email, active, date) VALUES(:pseudo, :password, :email, true, NOW())');
            $req->execute(array(
                'pseudo' => $_POST['pseudo'],
                'password' => $password_hash,
                'email' => $_POST['email']
            ));
            $req->closeCursor();
        }
        else{
            echo 'Erreur';
        }
    }