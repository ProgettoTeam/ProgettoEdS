<!DOCTYPE html>
<html lang="en">
<head>
      <!-- librerie importate -->
      <?php include ('../librerie.php') ?>

    <title>Parco</title>
</head>
<body>
<?php 
   $IdParco = $_GET["IdParco"];
   include '../DBconnection.php';
   $query = "SELECT * FROM parco WHERE IdParco=$IdParco";
   $result = mysqli_query($conn, $query);
   $parco = mysqli_fetch_array($result);
   include '../navbar.php';
?>

<h1 class="titolo"><?php echo $parco[1] ?></h1>
<div class="container-img">
   <img src="../../<?php echo $parco[6] ?>" class="imgparco"> </img>
   <div class="overlay">
      <div class="text"><?php echo $parco[5] ?></div>
      </div>
</div>


<h2 class="titolo" style="padding-bottom:0% !important;">Luogo</h2>
<p class="paragrafo"> <?php echo $parco[2] ?></p>

<!--------------->
<!--------------->
<!-- TABELLA 1 -->
<!--------------->
<!--------------->

<?php include  'tabellaFauna.php'?>


<!--------------->
<!--------------->
<!-- TABELLA FLORA -->
<!--------------->
<!--------------->

<?php include  'tabellaFlora.php'?>


<!-- jquery -->

<?php include '../footer.php'?>
</body>
</html>