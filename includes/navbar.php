
     <!--Commentaire en HTML-->
     <nav>
        <h1><?= $titre?></h1>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="#">Contact</a></li>
            <?php if(!isset($_SESSION['user'])): ?>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>
            <?php else: ?>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            <?php endif; ?> 
        </ul>
     </nav>