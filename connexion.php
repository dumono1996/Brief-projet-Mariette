<?php 
     $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'root' , '');
     if(isset($_POST['connexion'])){
        if(isset($_POST['email'])   AND (isset($_POST['mdp']))){
            $email =htmlspecialchars($_POST['email']);
            $mdp = sha1($_POST['mdp']);
        }else{
            $incorrect = "entrer les informations correctes";
        }
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
    <title>formulaire de connexion</title>
</head>
<body>
<?php 
        include_once "navbar.php"
    ?>
    <?php
        include_once "header.php"
    ?>
    <form method="POST" action="" class ="inscription-form">
        <div class="compte account">
            <?php 
               if(isset ($_POST['connexion'])){
                echo($incorrect);
               }
            ?>
           <div class="account-creation-row">CONNEXION</div>
            <div>
                <div class="information">E-Mail</div>
                <input type="text" class="inscription-input">
            </div>
            <div>
                <div class="information">MOT DE PASSE</div>
                <input type="password" class="inscription-input">
            </div>
            <button  class="inscription-btn" name="connexion">SE CONNECTER</button>
        </div>
        <div class="space">
            <div class="opacité connexion">
                <img src="Assets/hcimage.png" alt="" width="100%">
            </div>
            <label for="" class="image-couverture">
                <img src="Assets/sexy.jpg" alt="" width="100%" >
            </label>
        </div>
    </form>
    <?php
        include_once "footer.php"
    ?>
     <!-- JavaScript Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>