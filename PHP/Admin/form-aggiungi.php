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
include ("../navbar.php");
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
    
  <!-- COMBOBOX -->
  <div id="addRow">
    <label for="cars">Righe</label>
    <input name="cars" id="cars" value="<?php echo $value ?>" onchange="window.location.href='form-aggiungi.php?tabella=<?php echo $tabella ?><?php if($tabella == 'flora'){ echo $link; } ?>&value=' + this.value"></input>
</div>
  <?php
  include ("../Errors.php");
  include ("../Corrects.php");
  ?>
<div style="padding-top: 88px;"> 
  <!-- AGGIUNTA RIGHE -->
  <form action="form-aggiungi.php?tabella=<?php echo $tabella ?>&value=<?php echo $value ?><?php if($tabella == 'flora') { echo '&tipo=' . $tipo; }?>" method="POST" enctype="multipart/form-data">
    <input style="display: none" name="numRow" value="<?php echo $value ?>"></input>
    <input style="display: none" name="tabella" value="<?php echo $tabella ?>"></input>
    <table id="table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <?php
            $cont = 0;
            foreach ($fieldinfo as $val) {
              if($tabella == 'flora') {
                if($tipo == 'albero') {
                  if($cont > 3 && $cont != 5 && $cont < 8) {
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
                  if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont < 10) {
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
                  if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont != 8 && $cont != 9 && $cont != 12) {
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
                } else if($tabella == 'fauna') {
                  if($cont < (count($fieldinfo)) - 1) {
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
              $cont_txb = 1;
              foreach ($fieldinfo as $val) {
                if($tabella == 'flora') {
                  ////////////////////////////////////////////////////////////////////////////////RICOMINCIA DA QUI, DIVIDI IN ALBERO, ARBUSTO, PIANTA ERBACEA E COPIA IL CONTENUTO DEGLI IF SOPRA
                  if($tipo == 'albero') {
                    if($cont > 3 && $cont != 5 && $cont < 8) {
                      $cont_txb++;
                      $col = $val->name;
                      ?> 
                        <td><input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"></td>
                      <?php
                    } else if($cont == 0) {
                      ?>    
                        <td>
                          <div class="container-img-tab" id="containerimghome">
                            <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                            <!-- <div class="overlay-tab">
                              <div class="text">Inserisci immagine</div>
                            </div> -->
                          </div>
                        </td>
                      <?php
                    }
                  } else if($tipo == 'arbusto') {
                    if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont < 10) {
                      $cont_txb++;
                      $col = $val->name;
                      ?> 
                        <td><input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"></td>
                      <?php
                    } else if($cont == 0) {
                      ?>    
                        <td>
                          <div class="container-img-tab" id="containerimghome">
                            <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                            <!-- <div class="overlay-tab">
                              <div class="text">Inserisci immagine</div>
                            </div> -->
                          </div>
                        </td>
                      <?php
                    }
                  } else if($tipo == 'piantaErbacea') {
                    if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont != 8 && $cont != 9 && $cont != 12) {
                      $cont_txb++;
                      $col = $val->name;
                      ?> 
                        <td><input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"></td>
                      <?php
                    } else if($cont == 0) {
                      ?>    
                        <td>
                          <div class="container-img-tab" id="containerimghome">
                            <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                            <!-- <div class="overlay-tab">
                              <div class="text">Inserisci immagine</div>
                            </div> -->
                          </div>
                        </td>
                      <?php
                    }
                  }
                } else {
                  if($tabella == 'responsabile') {
                    if($cont > 0) {
                      $col = $val->name;
                      ?> 
                        <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"></td>
                      <?php
                    } 
                  } else if($tabella == 'fauna') {
                      if($cont < (count($fieldinfo)) - 1) {
                        if($cont > 1) {
                          $col = $val->name;
                          ?> 
                            <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"></td>
                          <?php
                        } else if($cont == 1) {
                          ?>
                            <td>
                            <div class="container-img-tab" id="containerimghome">
                              <input type="file" class="upload_image" name="col<?php echo $cont?>riga<?php echo $i?>"></input>
                            </div>
                            </td>
                          <?php
                        }  
                      }          
                  } else {
                    if($cont > 1) {
                      $col = $val->name;
                      ?> 
                        <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"></td>
                      <?php
                    } else if($cont == 1 && $tabella != 'responsabile') {
                      $col = $val->name;
                      ?>    
                        <td>
                          <div class="container-img-tab" id="containerimghome">
                            <input type="file" class="upload_image" name="col<?php echo $cont?>riga<?php echo $i?>"></input>
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
            <input type="submit" value="Annulla" name="Annulla" href="#">
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