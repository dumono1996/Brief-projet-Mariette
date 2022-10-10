<php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- <script src="js/bootstrap.js"></script> -->
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    
    <title>Document</title>
</head>
<body>
    <?php 
        include_once "navbar.php";
    ?>
    <?php 
      include_once "header.php";
    ?>
    <?php 
     include_once "connect.php";
     $reqAddHouse = "SELECT * FROM maisons";
     $send = $bdd->prepare($reqAddHouse);
     $send->execute();
     $HouseListing = $send->fetchAll();
    ?>
    <main class="main">
    <div class="cars-page">LISTE DES APPARTEMENTS</div>
    <div class="containers-wrapper">
        <div class="big-container">
           <?php 
           foreach($HouseListing as $House) :?>
            <div class="house-image">
            <img src= "<?php echo  $House["photo"]; ?>" alt="" width="300px" height="300px">
            <div>
                <span  class="in-house-image"><?php echo  $House["nom"]; ?> </span>
            </div>
            <div class="localisation">
                <img src="Assets/location-dot-solid-2.png" alt="" width="20px">
                <span><?php echo  $House["emplacement"]; ?></span>
            </div>
            <div class="stars-cov">
                <div class="stars">
                    <?php  for ($i=0; $i < $House["notation"]; $i++) :?>
                       
                            <label><img src="Assets\star-solid.png "alt="" width="20px" height="20px"></label >
                        <?php endfor; ?>
                    
                </div>
                <div class="tarif">
                    <span><?php echo  $House["prix"]; ?>/nuit</span>
                </div>
            </div>
            <button class="houses-rev-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">RESERVER</button>
        </div> 
         <?php endforeach;  ?>
        
           
    </div>

  

<!-- Modal -->

<!-- <button type="button" class="btn btn-primary d-block mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Reserver</button> -->

    <div class="modal fade" style="margin-top:300px ;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-body">
            <form class="bg-pink">
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nom:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary">Reserver</button>
          </div>
        </div>
      </div>
    </div>

<main>
<?php 
    include_once "footer.php";
?>
  <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>