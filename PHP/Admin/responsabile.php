<?php
include ('../DAL.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>responsabile</title>

<?php  include ("../librerie.php");?>
</head>
<body>
<?php 
   include ("../navbar.php");
   include '../DBconnection.php';
   $id_parco_responsabile = $_SESSION['fk_IdParco'];
   $query_parco_responsabile = "SELECT * FROM parco WHERE IdParco= '$id_parco_responsabile'";
   $result_parco_responsabile = mysqli_query($conn, $query_parco_responsabile);
   $parco = mysqli_fetch_array($result_parco_responsabile);
?>

<h1 class="titolo"><?php echo $parco['Nome']?> </h1>

<div class="container-img">
   <img src="../../<?php echo $parco['path_immagine']?>" class="imgparco"> </img>
</div>


<!--------------->
<!--------------->
<!-- TABELLA 1 -->
<!--------------->
<!--------------->

<?php include  '../Public/tabellaFauna.php'?>

<!--------------->
<!--------------->
<!-- TABELLA 2 -->
<!--------------->
<!--------------->

<?php include  '../Public/tabellaFlora.php'; ?>

<?php include ("../footer.php")?>    

</body>
</html>