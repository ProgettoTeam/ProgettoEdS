<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('../Librerie.php') ?>

</head>
<body>
<?php 

$tabella = $_GET["tabella"];
$id = $_GET["id"];
if($tabella == 'flora') {
  $tipo = $_GET["tipo"];
}
include ('../DAL.php'); 
include ("../Navbar.php");

if (!isset($_SESSION['IdResponsabile']) && !isset($_SESSION['IdAmministratore'])) {
  header("location:../Public/Login.php");
}

$colmuns = array();

$query_columns = "SELECT * FROM $tabella";
$result_columns = mysqli_query($conn, $query_columns);
$fieldinfo = mysqli_fetch_fields($result_columns);
foreach ($fieldinfo as $val) {
  $col = $val->name;
  array_push($colmuns, $col);
}

$get_element = "SELECT * FROM $tabella WHERE $colmuns[0] = $id";
$result = mysqli_query($conn, $get_element);
$value = mysqli_fetch_array($result);

if($tabella == 'flora') {
  $link = '&tipo=' . $tipo;
  ?>
    <h1 style="padding-left: 45%; padding-top: 11px">Modifica <?php if($tabella == 'flora') { echo $tipo; } else { echo $tabella; }?> <?php echo $value[0]; ?></h1>
  <?php
} else {
  ?>
    <h1 style="padding-left: 45%; padding-top: 11px">Modifica <?php echo $tabella ?> <?php echo $value[0]; ?></h1>
  <?php
}
?>

<?php
  include ("../Errors.php");
  include ("../Corrects.php");
?>

<div class="container-form-modifica">
  <form action="Form-modifica.php?tabella=<?php echo $tabella ?>&id=<?php echo $id ?><?php if($tabella == 'flora') { echo '&tipo=' . $tipo; } ?>" method="POST" enctype="multipart/form-data">
    <input style="display: none" name="tabella" value="<?php echo $tabella ?>"></input>
    <?php include '../Form.php'; ?>
    <div class="rowimg">
    <div class="columnbtn">
          <input type="submit" value="Annulla" name="annulla">
    </div>
    <div class="columnbtn">
        <input type="submit" value="Modifica" name="modifica">
    </div>
    </div>   
  </form>
</div>
<?php include ("../Footer.php")?>

</body>
</html>