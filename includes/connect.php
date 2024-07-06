<?php 
      //constantes d'environement
      define("DB_HOST", "localhost");                
      define("DB_NAME", "akdev");
      define("DB_PASS", "");
      define("DB_USER", "root");

      //DSN de connexion
      $dsn = "mysql:dbname=".DB_NAME.";host=".DB_HOST;

      //Connexion à la base de données
      try {

          //On crée une instance de la classe PDO
          $pdo = new PDO($dsn, DB_USER, DB_PASS);
          echo "Connexion réussie <br>";

          //On s'assure d'envoyer les données en UTF8
          $pdo->exec("SET NAMES UTF8");

          //On définit le mode de fetch par défaut
          $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

      } catch (PDOException $e) {
          echo "Connexion échouée : ".$e->getMessage();
      }