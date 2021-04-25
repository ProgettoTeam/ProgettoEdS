<div class="rowimg">
   <div class="column">
      <h2 class="titolo2" style="float:left;">Fauna</h2>
   </div>

   <?php
      if(basename($_SERVER['PHP_SELF']) != 'Parco.php') {
         ?>
         <div class="column">
            <div class="bottone">
               <a href="../Admin/Form-aggiungi.php?tabella=fauna&value=1" class="btn btn-success btn-lg">
                  <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
               </a>
            </div>
         </div>
         <?php
      }
      ?>
      <div calss="column"> 
         <?php
         $tabella = 'fauna';
         include 'Searchbar.php';
      ?>
      </div>
</div>

<table id="tableData" class="table table-bordered table-striped">
   <thead>
      <tr>
         <?php
         if(basename($_SERVER['PHP_SELF']) != 'Parco.php') {
         ?>
            <th>Animale</th>
            <th class="DisplayNone">Adulto</th>
            <th class="DisplayNone">Sesso</th>
            <th class="DisplayNone">Salute</th>
            <th>Specie</th>
         <?php
         } else {
            ?>
            <th>Animale</th>
            <th>Sesso</th>
            <th>Specie</th>
            <th>Ordine di appartenenza</th>
         <?php
         }
         ?>
      </tr>
   </thead>
   <tbody>
   <?php
      $query_fauna = "SELECT * FROM fauna WHERE fk_IdParco = '$parco[0]'";
      if(isset($_POST["submit_fauna"])){
         $specieAnimale = mysqli_real_escape_string($conn, $_POST['search']);
         $query_fauna = "SELECT * FROM fauna INNER JOIN categoria ON (fk_IdCategoria = IdCategoria) WHERE categoria.Specie LIKE '$specieAnimale' AND fauna.fk_IdParco = '$parco[0]'";
      }
      if($result = mysqli_query($conn, $query_fauna)) {
         $fieldinfo = mysqli_fetch_fields($result);
         while($row = mysqli_fetch_array($result))
         { 
            $query_categoria = "SELECT * FROM categoria WHERE IdCategoria = " . $row['fk_IdCategoria'];
            $result_categoria = mysqli_query($conn, $query_categoria);
            $categoria = mysqli_fetch_array($result_categoria);
            ?>
            <tr>
               <td>
                  <img src=" ../../<?php echo $row['path_immagine'] ?>" id="img_tabella"></img>
               </td>
               <?php
               if(basename($_SERVER['PHP_SELF']) != 'Parco.php') {
                  if($row['IsAdult'] == 1) {
                     $IsAdult = 'si';
                  } else {
                     $IsAdult = 'no';
                  }
               ?>
                  <td class="DisplayNone"><?php echo $IsAdult?></td>
               <?php
               }
               ?>
               <td class="DisplayNone"><?php echo $row['Sesso'] ?></td>
               <?php
               if(basename($_SERVER['PHP_SELF']) != 'Parco.php') {
               ?>
                  <td class="DisplayNone"><?php echo $row['Salute']?></td>
               <?php
               }

               if(basename($_SERVER['PHP_SELF']) != 'Parco.php') {
               ?>
                  <td><?php echo $categoria['Specie']?></td>
               <?php
               } else {
                  ?>
                  <td><?php echo $categoria['Specie']?></td>
                  <td><?php echo $categoria['OrdineAppartenenza']?></td> 
                  <?php
               }
               ?>
               <?php
                  if(basename($_SERVER['PHP_SELF']) == 'Responsabile.php') {
                     $tab = 'fauna';
                     include '../Admin/Button_modifica-elimina.php';
                  }
               ?>
            </tr>
            <?php
         } 
      } 
      ?>
   </tbody>
</table>