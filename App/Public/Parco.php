<!DOCTYPE html>
<html lang="en">
<head>
      <!-- librerie importate -->
   <?php include ('../Librerie.php') ?>
   <?php 
   $IdParco = $_GET["IdParco"];
   include '../DBconnection.php';
   include '../DAL.php';
   $query = "SELECT * FROM parco WHERE IdParco=$IdParco";
   $result = mysqli_query($conn, $query);
   $parco = mysqli_fetch_array($result);
   ?>
   <title><?php echo $parco["Nome"]?> | ParchiNazionali</title>
</head>
<body>
   <?php
   include '../Navbar.php';
   ?>


<h1 class="titolo"><?php echo $parco[2] ?></h1>
<div class="container-img">
   <img src="../../<?php echo $parco[1] ?>" class="imgparco"> </img>
   <div class="overlay">
      <div class="text"><?php echo $parco[6] ?></div>
      </div>
</div>


<h2 class="titolo" style="padding-bottom:0% !important;">Luogo</h2>
<p class="paragrafo"> <?php echo $parco[3] ?></p>

<!--------------->
<!--------------->
<!-- TABELLA 1 -->
<!--------------->
<!--------------->

<?php 
include  'TabellaFauna.php';
include  'TabellaFlora.php';
include '../DBclose.php';
include '../Footer.php'
?>
</body>
</html>