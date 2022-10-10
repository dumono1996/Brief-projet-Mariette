<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>formulaire</title>
</head>
<?php 
    include_once "header.php";
?>
<body class="add-body">
    <form name="formAdd" method="POST" enctype="multipart/form-data" class="upload-form">
        <h2 align ="center" class="cars-page add">Ajouter Une Nouvelle Voiture</h2>
       <div class="form-container">
            <div>
                    <label class="information">Nom:</label><br/>
                    <input type="text" name="txt" class="zonetext inscription-input " placeholder="Entrer le nom" required>
            </div>
                <div>
                    <label class="information">Prix:</label><br/>
                    <input type="text" name="txtprice" class="zonetext inscription-input" placeholder="Entrer prix" required>
                </div>
                <div>
                    <label class="information">Places:</label><br/>
                    <input type="text" name="txtplaces" class="zonetext inscription-input" placeholder="Entrer les nombres de places" required>
                </div>
            <div>
                <label class="information">Modèle:</label><br/>
                <input type="text" name="txtmodele" class="zonetext inscription-input" placeholder="Entrer le modèle" required>
            </div>
            <div>
                <label class="information">genre:</label><br/>
                <input type="text" name="txtgenre" class="zonetext inscription-input" placeholder="Entrer le genre" required>
            </div>
            <div>
                <label class="information">Photo:</label><br/>
                <input type="file" name="txtphoto" class="zonetext inscription-input" placeholder="Choisir une image" required>
            </div>

            <input type="submit" name="btadd" value="Ajouter" id="submit"/>
        </div>
        <label style="text-align: center; color:">
         <?php 
         include_once "connect.php";
         if(isset($_POST['btadd'])){
           
            $nom=$_POST['txt'];
            $prix=$_POST['txtprice'];
            $places=$_POST['txtplaces'];
            $modèle=$_POST['txtmodele'];
            $genre=$_POST['txtgenre'];

            $image=$_FILES['txtphoto']['tmp_name'];
            $traget="Assets/".$_FILES['txtphoto']['name'];
            move_uploaded_file($image,$traget);
            $reqAdd="INSERT INTO voiture(nom,prix,places,modele,genre,photo) VALUE(:nom,:prix,:places,:modele,:genre,:photo)";

            $resultat=$test = $bdd->prepare($reqAdd);
            echo"coucou" .$nom;
            $array = [
                "nom" => $nom,
                "prix" =>$prix,
                "places" =>$places,
                "modele" =>$modèle,
                "genre" =>$genre,
                "photo"  =>$traget,
            ];
           $test->execute( $array);
            // $resultat=mysql_query($bdd,$reqAdd);

            if($resultat){
                echo"Insertion réussie";
            }else{
                echo "Echec d'insertion de donnée";
            }
         }
         ?>
        </label>
    </form>
    <?php 
         include_once "footer.php";
    ?>
</body>
</html>