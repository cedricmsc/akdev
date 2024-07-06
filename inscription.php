<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin: auto;
            border-collapse: collapse;
        }
        td{
            padding: 10px;
            border: 1px solid black;
        }
        button{
            margin-left: 50%;
        }
    </style>
</head>
<body>
  <?php
    
  
  

  ?>
     <!-- Formulaire d'inscription -->
     <form method="post" action="traitement.php">
    <table >
        
        <tr>
            <td>
                <label for="nom">Nom*</label>
            </td>
            <td>
                <input type="text" name="nom" id="nom" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="prenom">Prenom</label>
            </td>
            <td>
                <input type="text" name="prenom" id="prenom" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="pseudo">Pseudo*</label>
            </td>
            <td>
                <input type="text" name="pseudo" id="pseudo" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">Email*</label>
            </td>
            <td>
                <input type="email" name="email" id="email">
            </td>
        </tr>
        <tr>
            <td>
                <label for="pass">Mot de passe*</label>
            </td>
            <td>
                <input type="password" name="pass" id="pass" required>
            </td>
        </tr>
    </table>
    <button type="submit" name="m_incrire">M'inscrire</button>
    </form>
    
</body>
</html>

