<?php
include ('../DAL.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('../librerie.php') ?>

    <title>Form-Modifica</title>
</head>
<body>
<?php 
include ("../navbar.php");

$tabella = $_GET["tabella"];
$id = $_GET["id"];
if($tabella == 'flora') {
  $tipo = $_GET["tipo"];
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

<div class="container-form-modifica">
  <form action="form-modifica.php">
  <?php include '../form.php'; ?>

      <!-- se vuoi creare altri campi copia questi elementi 
      
      <label for="CampoN-name">CampoN</label>
      <input type="text" id="campoN" name="CampoN-name" value=" <?php /* echo("#Introduci campoN") */?>">
      -->

      <div class="rowimg">
    <div class="columnbtn">
          <input type="submit" value="Annulla" name="annulla">
    </div>

    <div class="columnbtn">
        <input type="submit" value="Modifica" name="modifica">
    </div>

    <!-- puoi fare la verifica nella pagina 'pagina-che-gestisce.php' la verifica 
      sul submit vedendo il testo che ha schiacciato
      (verifica sul 'name' --annulla o modifica-- ) -->
    </div>   
  </form>
</div>

<?php include ("../footer.php")?>

</body>
</html>