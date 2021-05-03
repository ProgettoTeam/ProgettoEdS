<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
      <title>AGGIUNGI | ParchiNazionali</title>
      <?php include ('../Librerie.php') ?>
    </head>

</head>
<body>
<?php 
$value = $_GET["value"];
$tabella = $_GET["tabella"];
if($tabella == 'flora') {
  $tipo = $_GET["tipo"];
}
include '../DBconnection.php';

$query = "SELECT * from $tabella";
$result = mysqli_query($conn, $query);
// Get field information for all fields
$fieldinfo = mysqli_fetch_fields($result);

include ('../DAL.php'); 
if (!isset($_SESSION['IdResponsabile']) && !isset($_SESSION['IdAmministratore'])) {
  header("location:../Public/Login.php");
}
include ("../Navbar.php");
if($tabella == 'flora') {
  $link = '&tipo=' . $tipo;
  ?>
    <h1 style="padding-left: 45%; padding-top: 11px">Aggiungi <?php echo $tipo ?></h1>
  <?php
} else {
  ?>
    <h1 style="padding-left: 45%; padding-top: 11px">Aggiungi <?php echo $tabella ?></h1>
  <?php
}
?>

<div class="container-form-modifica">
    
<div id="addRow">
  <label for="cars">Righe</label>
  <input name="cars" id="cars" value="<?php echo $value ?>" onchange="window.location.href='Form-aggiungi.php?tabella=<?php echo $tabella ?><?php if($tabella == 'flora'){ echo $link; } ?>&value=' + this.value"></input>
</div>
  <?php
  include ("../Errors.php");
  include ("../Corrects.php");
  ?>
<div style="padding-top: 88px;"> 
  <!-- AGGIUNTA RIGHE -->
  <form action="Form-aggiungi.php?tabella=<?php echo $tabella ?>&value=<?php echo $value ?><?php if($tabella == 'flora') { echo '&tipo=' . $tipo; }?>" method="POST" enctype="multipart/form-data">
    <input style="display: none" name="numRow" value="<?php echo $value ?>"></input>
    <input style="display: none" name="tabella" value="<?php echo $tabella ?>"></input>
    <?php 
      include '../Form.php'; 
    ?>


    <div class="rowimg">
      <div class="columnbtn">
            <input type="submit" value="Annulla" name="Annulla">
      </div>

      <div class="columnbtn">
          <input type="submit" value="Aggiungi" name="Aggiungi">
      </div>

    </div>

    
  </form>
</div>
</div>

<script src="../../Js/index.js"></script>

<?php 
include '../DBclose.php';
include "../Footer.php";
?>

<script>
    $('.combobox option[value="<?=$value?>"]').prop('selected', true);
</script>

</body>
</html>