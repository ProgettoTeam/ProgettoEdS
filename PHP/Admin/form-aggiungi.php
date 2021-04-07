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

    <title>form-aggiungi</title>
</head>
<body>
<?php 
include ("../navbar.php");
include '../DBconnection.php';
$tabella = $_GET["tabella"];
if($tabella == 'flora') {
  $tipo = $_GET["tipo"];
  $link = '&tipo=' . $tipo;
  ?>
    <h1 style="padding-left: 45%; padding-top: 11px">Aggiungi <?php echo $tipo ?></h1>
  <?php
} else {
  ?>
    <h1 style="padding-left: 45%; padding-top: 11px">Aggiungi <?php echo $tabella ?></h1>
  <?php
}
$value = $_GET["value"];
?>

<div class="container-form-modifica">
    
  <!-- COMBOBOX -->
  <div style="float:right; padding-top: 90px; margin-right:100px;"> 
    <label for="cars">Righe</label>
    <select name="cars" id="cars" class="combobox" onchange="window.location.href='form-aggiungi.php?tabella=<?php echo $tabella ?><?php if($tabella == 'flora'){ echo $link; } ?>&value=' + this.options[this.selectedIndex].value">
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
              if($tabella == 'flora') {
                if($tipo == 'albero') {
                  if($cont > 3 && $cont != 8 && $cont != 9 && $cont != 10 && $cont != 11) {
                    $col = $val->name;
                    ?> 
                      <th> <?php echo $col ?></th>
                    <?php
                  } else if($cont == 1) {
                    ?>
                      <th> Immagine </th>
                    <?php
                  }
                } else if($tipo == 'arbusto') {
                  if($cont > 3 && $cont != 6 && $cont != 7 && $cont != 10 && $cont != 11) {
                    $col = $val->name;
                    ?> 
                      <th> <?php echo $col ?></th>
                    <?php
                  } else if($cont == 1) {
                    ?>
                      <th> Immagine </th>
                    <?php
                  }
                } else if($tipo == 'piantaErbacea') {
                  if($cont > 3 && $cont != 6 && $cont != 7 && $cont != 8 && $cont != 9) {
                    $col = $val->name;
                    ?> 
                      <th> <?php echo $col ?></th>
                    <?php
                  } else if($cont == 1) {
                    ?>
                      <th> Immagine </th>
                    <?php
                  }
                }
              } else {
                if($tabella == 'responsabile') {
                  if($cont > 0) {
                    $col = $val->name;
                    ?> 
                      <th> <?php echo $col ?></th>
                    <?php
                  }
                } else {
                  if($cont > 1) {
                    $col = $val->name;
                    ?> 
                      <th> <?php echo $col ?></th>
                    <?php
                  } else if($cont == 1 && $tabella != 'responsabile') {
                    ?>
                      <th> Immagine </th>
                    <?php
                  }
                }
              }
              $cont++;
            }
            mysqli_free_result($result);
          ?>
        </tr>
      </thead>
      <?php
      for($i = 0; $i < $value; $i++) {
      ?>
        <tbody>
            <?php
              $cont = 0;
              foreach ($fieldinfo as $val) {
                if($tabella == 'flora') {
                  if($cont <= 5 && $cont != 0) {
                    $col = $val->name;
                    ?> 
                      <td><input type="text" class="campoN" name="CampoN-name" placeholder="Introduci campo <?php echo $cont ?>"></td>
                    <?php
                  } else if($cont == 0) {
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
                } else {
                  if($tabella == 'responsabile') {
                    if($cont > 0) {
                      $col = $val->name;
                      ?> 
                        <td><input type="text" class="campoN" name="CampoN-name" placeholder="Introduci campo <?php echo $cont ?>"></td>
                      <?php
                    }
                  } else {
                    if($cont > 1) {
                      $col = $val->name;
                      ?> 
                        <td><input type="text" class="campoN" name="CampoN-name" placeholder="Introduci campo <?php echo $cont ?>"></td>
                      <?php
                    } else if($cont == 1 && $tabella != 'responsabile') {
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
                  }
                }
                $cont++;
              }
            ?>
        </tbody>
        <?php
      }
      ?>
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
include "../footer.php";
?>

<script>
    $('.combobox option[value="<?=$value?>"]').prop('selected', true);
</script>

</body>
</html>