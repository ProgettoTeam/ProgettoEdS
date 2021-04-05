<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ('../librerie.php') ?>

    <title>form-aggiungi</title>
</head>
<body>
<?php 
include ("../navbar.php");
include '../DBconnection.php';
$tabella = $_GET["tabella"];
?>

<h1 style="padding-left: 45%; padding-top: 11px">Aggiungi <?php echo $tabella ?></h1>

<div class="container-form-modifica">

  <!-- COMBOBOX -->
  <div style="float:right; padding-top: 80px"> 
    <label for="cars">Righe</label>
    <select name="cars" id="cars" class="combobox" onclick="Combobox(value)">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
  </div>
  <!--------------------------------->

  <!-- AGGIUNTA RIGHE -->
  <form action="login.php" method="POST">
    <table id="table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <?php
            $query = "SELECT * from $tabella";
            $result = mysqli_query($conn, $query);
            // Get field information for all fields
            $fieldinfo = mysqli_fetch_fields($result);
            $cont = 0;
            foreach ($fieldinfo as $val) {
              if($cont > 1) {
                $col = $val->name;
                ?> 
                  <th> <?php echo $col ?></th>
                <?php
              } else if($cont == 1) {
                ?>
                  <th> Immagine </th>
                <?php
              }
              $cont++;
            }
            mysqli_free_result($result);
          ?>
        </tr>
      </thead>
      <tbody>
          <?php
            $cont = 0;
            foreach ($fieldinfo as $val) {
              if($cont > 1) {
                $col = $val->name;
                ?> 
                  <td><input type="text" class="campoN" name="CampoN-name" placeholder="Introduci campo <?php echo $cont ?>"></td>
                <?php
              } else if($cont == 1) {
                ?>    
                  <td>
                    <div class="container-img-tab" id="containerimghome">
                      <img src="../../CSS/bianco.jpg" id="img_tabella"></img>
                      <div class="overlay-tab">
                        <div class="text">Inserisci immagine</div>
                      </div>
                    </div>
                  </td>
                <?php
              }
              $cont++;
            }
          ?>
      </tbody>
    </table>


    <!-- se vuoi creare altri campi copia questi elementi 
    
    <label for="CampoN-name">CampoN</label>
    <input type="text" id="campoN" name="CampoN-name" value=" placeholder="Introduci campo1">
    -->

    <div class="rowimg">
      <div class="columnbtn">
            <input type="submit" value="Annulla" name="Annulla">
      </div>

      <div class="columnbtn">
          <input type="submit" value="Aggiungi" name="Aggiungi">
      </div>

      <!-- puoi fare la verifica nella pagina 'pagina-che-gestisce.php' la verifica 
        sul submit vedendo il testo che ha schiacciato
        (verifica sul 'name' --annulla o modifica-- ) -->
    </div>

    
  </form>
</div>

<script src="../../JS/index.js"></script>

<?php 
include '../DBclose.php';
include ("../footer.php");
?>

</body>
</html>