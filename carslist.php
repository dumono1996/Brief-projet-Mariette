<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/850a319b00.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>carlist</title>
</head>
<body>
    <?php 
        include_once "navbar.php";
    ?>
    <?php 
       include_once "header.php";
    ?>
    <main class="cars-main">
      <?php
        include_once "connect.php";
      ?>
      <?php 
        $reqAddCars = "SELECT * FROM voiture";
        $envoyer = $bdd->prepare( $reqAddCars);
        $envoyer->execute();
        $Carslist = $envoyer->fetchAll();
      ?>
       <div class="cars-page">LISTE DES VOITURES</div>
      <div class="car-listing">
            <div class="before-listing">
                    <div>
                        <div>
                            <img src="recherche.png" alt="" width="20px" height="20px">
                        </div>
                        <div class="cars-name">Trouver une voiture</div>
                    </div>
                        <div class="selection">Sélectionner la marque
                            <div  class="cov-input">
                                <input type="text">
                            </div>
                        </div>
                        <div class="selection">sélectionner le type de carburant
                            <div>
                                <input type="text">
                            </div>
                        </div>
                        <button class="search-btn4">Rechercher</button>
                    </div>
                    
            <div  class="block">
                <?php 
                foreach($Carslist as $Cars) : ?>
                <div  class="cars-image">
                    <!-- <div> -->
                        <img src="<?php echo $Cars["photo"]?>" alt="" width="100%" height="300px">
                    <!-- </div> -->
                  <div>
                    <div class="cars-name"><?php echo $Cars["nom"]; ?></div>
                    <div class="cars-name"><?php echo $Cars["prix"]; ?>/jr</div>
                    <div class="indications">
                        <div> <i class="fa-regular fa-user cars-icon"></i><?php echo $Cars["places"]; ?></div>
                        <div> <i class="fa-solid fa-calendar-days  cars-icon"></i><?php echo $Cars["modele"]; ?> model</div>
                        <div> <i class="fa-solid fa-car  cars-icon"></i><?php echo $Cars["genre"]; ?></div>
                    </div>
                    <button class="search-btn4">Réserver</button>
                </div>
            </div>

<!-- ====================================================== card bootstrap ================================== -->
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $Cars["photo"]?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $Cars["nom"]; ?></h5>
                  <h5 class="card-title"><?php echo $Cars["prix"]; ?>/jr</h5>
                  <a href="#" class="btn btn-primary">Réserver</a>
                </div>
              </div>
<!-- ====================================================== card bootstrap ================================== -->
                <?php endforeach; ?> 
            </div>
      </div>
    </main>
   <?php 
    include_once "footer.php";
   ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>