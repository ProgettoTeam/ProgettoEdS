<div class="rowimg">
   <div class="column">
      <h2 class="titolo2" style="float:left;">Fauna</h2>
   </div>

   <div class="column">
      <div class="bottone">
      <?php
         if(basename($_SERVER['PHP_SELF']) == 'parco.php') {
         ?>
            <a href="../Admin/form-aggiungi.php?tabella=fauna&value=1" class="btn btn-success btn-lg">
               <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
            </a>
         <?php
         } else {
         ?>
            <a href="form-aggiungi.php?tabella=fauna&value=1" class="btn btn-success btn-lg">
               <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
            </a>
         <?php
         }
      ?>
      </div>
   </div>
   
   <?php 
   $tabella = 'fauna';
   include 'Searchbar.php' 
   ?>
</div>

<table id="tableData" class="table table-bordered table-striped">
   <thead>
      <tr>
         <th>Animale</th>
         <th>Specie</th>
         <th>Ordine di appartenenza</th>
         <th>Sesso</th>
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
         while($fauna = mysqli_fetch_array($result))
         { 
            $query_categoria = "SELECT * FROM categoria WHERE IdCategoria = " . $fauna['fk_IdCategoria'];
            $result_categoria = mysqli_query($conn, $query_categoria);
            $categoria = mysqli_fetch_array($result_categoria);
            ?>
            <tr>
               <td>
                  <img src=" ../../<?php echo $fauna['path_immagine'] ?>" id="img_tabella"></img>
               </td>
               <td><?php echo $categoria['Specie']?></td>
               <td><?php echo $categoria['OrdineAppartenenza']?></td> 
               <td><?php echo $fauna['Sesso'] ?></td>
            </tr>
            <?php
         } 
      } 
      ?>
   </tbody>
</table>