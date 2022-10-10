<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter les maisons</title>
</head>
<?php 
    include_once "header.php";
?>
<body class="add-body">
    <form name="formAdd" method="POST" enctype="multipart/form-data" class="upload-form">
        <h2 align ="center" class="cars-page add">Ajouter Une Nouvelle Maison</h2>
       <div class="form-container">
            <div>
                <label class="information">Nom:</label><br/>
                <input type="text" name="nom" class="zonetext inscription-input " placeholder="Entrer le nom" required>
            </div>
                <div>
                    <label class="information">emplacement:</label><br/>
                    <input type="text" name="emplacement" class="zonetext inscription-input" placeholder="Entrer l'emplacement" required>
                </div>
                <div>
                    <label class="information">prix:</label><br/>
                    <input type="text" name="prix" class="zonetext inscription-input" placeholder="Entrer le prix" required>
                </div>
            <div>
                <label class="information">notation:</label><br/>
                <input type="text" name="notation" class="zonetext inscription-input" placeholder="Entrer la notation" required>
            </div>
            <div>
                <label class="information">photo:</label><br/>
                <input type="file" name="photo" class="zonetext inscription-input" placeholder="Choisir une image" required>
            </div>

            <input type="submit" name="btnadd" value="Ajouter" id="submit"/>
        </div>
        <label style="text-align: center; color:">
         <?php 
        include_once "connect.php";
         if(isset($_POST['btnadd'])){
             $nom=$_POST['nom'];
             $emplacement=$_POST['emplacement'];
             $prix=$_POST['prix'];
             $notation=$_POST['notation'];

             $image=$_FILES['photo']['tmp_name'];
             $trajet="Assets/".$_FILES['photo']['name'];
             move_uploaded_file($image,$trajet);
             $reqAddHouse="INSERT INTO maisons(nom,emplacement,photo,notation,prix) VALUE(:nom,:emplacement,:photo,:notation,:prix)";
             $testAdd = $bdd->prepare($reqAddHouse);
              $array = [
                "nom" => $nom,
                "emplacement" =>$emplacement,
                "photo"  =>$trajet,
                "prix" =>$prix,
                "notation" =>$notation,
            ];
            $resultat = $testAdd->execute( $array);
            // $resultat=mysql_query($bdd,$reqAdd
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