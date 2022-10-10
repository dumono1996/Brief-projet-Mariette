<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
        include_once "connect.php";
      ?>
      
      <?php 
        $reqAddCars = "SELECT * FROM voiture";
        $envoyer = $bdd->prepare( $reqAddCars);
        $envoyer->execute();
        $Carslist = $envoyer->fetchAll();
      ?>

<div class="box">
<?php 
                foreach($Carslist as $Cars) : ?>
    <div class="container">
     	<div class="row">
			 
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               
					<div class="box-part text-center">
                        
                        <!-- <i class="fa fa-instagram fa-3x" aria-hidden="true"></i> -->
                        <img src="<?php echo $Cars["photo"]?>" alt="" width="100%" height="300px">
                        
						<div class="title">
							<h4>Instagram</h4>
						</div>
                        
						<div class="text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>
                        
						<a href="#">Learn More</a>
                        
					 </div>
				</div>	 
				
				 
	
		</div>		
    </div>
    <?php endforeach; ?> 
</div>
