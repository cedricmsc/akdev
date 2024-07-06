<?php
    //On démarre la session PHP
    session_start();
    if(isset($_SESSION['user'])){
        header('Location: profil.php');
        exit;
    }
    //On vérifie que le formulaire a été envoyé
    if(!empty($_POST)){
   
        //On vérifie que tous les champs obligatoires sont remplis
        if(isset($_POST["nom"], $_POST["pseudo"], $_POST["email"], $_POST["pass"]) && !empty($_POST["nom"] ) && !empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["pass"])) {
            //Le formulaire est complet
            //On récupère les données en les protégants contre les failles XSS
            $nom    = strip_tags($_POST["nom"]);
            $prenom = strip_tags($_POST["prenom"]);
            $pseudo = strip_tags($_POST["pseudo"]);
            $email  = $_POST["email"];

            //On vérifie que le pseudo fasse au moins 05 caractères
            if(strlen($pseudo) < 5){
                die("Le pseudo doit faire au moins 5 caractères");
            }

            //On vérifie que l'email est valide
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                die("L'email n'est pas valide"); 
            }

            //On hashe le mot de passe
            $pass = password_hash($_POST['pass'], PASSWORD_ARGON2ID);

            //On vérifie que le mot de passe fasse au moins 8 caractères
             if(strlen($pass) < 8){
                die("Le mot de passe doit faire au moins 8 caractères"); 
            }


/*********************************************************************************** */
            //On enregistre le nouvel utilisateur dans la base de données
            require_once 'includes/connect.php';

            //On écrit la requête d'insertion
            $sql = "INSERT INTO `users` (`username`, `email`, `password`,`lastname`,`firstname`, `roles`, `created_at`) VALUES (:pseudo, :email, '$pass', :nom , :prenom, '[\"ROLE_USER\"]', NOW())";

            //On prépare la requête
            $requete = $pdo->prepare($sql);           

            //On injecte les valeurs dans la requête
            $requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR); //::panaïm deculotaïm
            $requete->bindValue(':email', $email, PDO::PARAM_STR);
            $requete->bindValue(':nom', $nom, PDO::PARAM_STR);
            $requete->bindValue(':prenom', $prenom, PDO::PARAM_STR);

             //On exécute la requête
            $requete->execute();

            

            //On récupère l'id du nouvel utilisateur
            $id = $pdo->lastInsertId();

            echo "<h1>Inscription réussie</h1>"; //On affiche un message de succès


            //On connecte l'utilisateur

            //On stocke les informations de l'utilisateur dans la session
            $_SESSION['user'] = [
                "id"        => $id, 
                "pseudo"    => $pseudo,
                "email"     => $email, 
                "lastname"  => $nom,
                "firstname" => $prenom,
                "roles"     => ['ROLE_USER']
            ];
            
                //On redirige l'utilisateur vers la page de profil
                header('Location: profil.php');  
            
        } else {
            //Il y'a des erreurs
            die("Le formulaire est incomplet"); 
        }

    }
   