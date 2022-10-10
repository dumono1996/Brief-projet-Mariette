<?php
   include_once "connect.php";  
    if(isset($_POST['envoi'])){
        if(!empty($_POST['username']) AND !empty($_POST['mdp'])  AND !empty($_POST['confirm-mdp']) AND !empty($_POST['email']) AND !empty($_POST['confirm-mdp'])){
            if(($_POST['mdp']) === ($_POST['confirm-mdp'])){
                $email =htmlspecialchars($_POST['email']);
                $username=htmlspecialchars($_POST['username']);
                $mdp = sha1($_POST['mdp']);
                $confirm = sha1($_POST['confirm-mdp']);
                $insertUser = $bdd->prepare('INSERT INTO users(username, mdp, confirm-mdp, email)VALUES(?, ?, ?)');
                $insertUser->execute(array($username, $mdp,$confirm, $email));
            }else{
                echo "Vous êtes déjà enregistré...";
            }
            
        }else{
            echo "Veuillez compléter tous les champs...";
        }
    }


    session_start();
    $email =htmlspecialchars($_POST['email']);
    $username=htmlspecialchars($_POST['username']);
    $mdp = sha1($_POST['mdp']);
    $verify_username = $bdd->prepare("SELECT id FROM users WHERE username=? limit 1");
    $verify_username->execute(array($username));
    $pseudo = $verify_username->fetchAll();
    if (count($pseudo) > 0)
    $erreur = "Pseudo existe déjà !";
    else{
        $inscrip = $bdd->prepare("INSERT INTO users(username,mdp,email) VALUES(?,?,?,?)");
        if($inscrip->execute(array($email, $username, $mdp,)))
        header("location:inscription.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>formulaire d'inscription</title>
</head>
<body>
    <?php 
        include_once "navbar.php"
    ?>
    <?php
        include_once "header.php"
    ?>
    <form method="POST" class="inscription-form">
       <div class="space">
            <div class="opacité">
                <img src="Assets/hcimage.png" alt="" width="100%">
            </div>
            <label for="" class="image-cover">
                <img src="Assets/Bug life.jpg" alt="" width="100%">
            </label>
       </div>
        <div class="compte">
           <div class="account-creation-row">CREER UN COMPTE</div>
            <div class="information">NOM D'UTILISATEUR</div>
            <label>
                <input type="text"  placeholder="riri" class="inscription-input" name="username" id="username ">
            </label>
            <div class="information">E-Mail</div>
            <label>
                <input type="text"  placeholder="riri@gmail.com" class="inscription-input" name="email">
            </label>
            <div  class="information">MOT DE PASSE</div>
            <label>
                <input type="password" class="inscription-input" name="mdp" id="password">
            </label>
            <div  class="information">CONFIRMATION MOT DE PASSE</div>
            <label>
                <input type="password"  class="inscription-input" name="confirm-mdp">
            </label>
            <button class="inscription-btn" type="submit" name="envoi">S'INSCRIRE</button>
      </div>
    </form>
    <?php
        include_once "footer.php"
    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>