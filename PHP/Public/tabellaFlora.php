<!--------------->
<!--------------->
<!-- TABELLA 2 -->
<!--------------->
<!--------------->


<div class="rowimg">
   <div class="column">
      <h2 class="titolo2" style="float:left;">Alberi</h2>
   </div>
      <?php
         if(basename($_SERVER['PHP_SELF']) != 'parco.php') {
            ?>
            <div class="column">
               <div class="bottone">
               <a href="../Admin/form-aggiungi.php?tabella=flora&tipo=albero&value=1" class="btn btn-success btn-lg">
                  <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
               </a>
            </div>
         </div>
         <?php
         } 
         ?>
         <div calss="column"> 
         <?php
         $tabella = 'alberi';
         include 'Searchbar.php';
      ?>
      </div>
</div>

<table id="tableData2" class="table table-bordered table-striped">
   <thead>
      <tr>
         <th>Albero</th>
         <th>Genere</th>
         <th>Tipo di foglie</th>
         <th>Stagione di fioritura</th>
      </tr>
   </thead>
   <tbody>
   <?php
      $query_albero = "SELECT * FROM flora WHERE Categoria = 'Albero' AND fk_IdParco = '$parco[0]'";
      if(isset($_POST["submit_alberi"])){
         $genereAlbero = mysqli_real_escape_string($conn, $_POST['search']);
         $query_albero = "SELECT * FROM flora WHERE GenereAlbero LIKE '$genereAlbero' AND flora.fk_IdParco = '$parco[0]'";
      }
      if($result_albero = mysqli_query($conn, $query_albero)) {
         while($albero = mysqli_fetch_array($result_albero))
         { 
            ?>
            <tr>
               <td>
                  <img src=" ../../<?php echo $albero['path_immagine_albero'] ?>" id="img_tabella"></img>
               </td>
               <td><?php echo $albero['GenereAlbero']?></td>
               <td><?php echo $albero['TipoFoglie']?></td> 
               <td><?php echo $albero['Stagione_fioritura'] ?></td>
               <td>
                  <a href="../Admin/form-modifica.php" class=" btn btn-success btn-lg">Modifica</a>
               </td>
               <td>
                  <a href="#" class=" btn btn-success btn-lg elimina">Elimina</a>
               </td>
            </tr>
            <?php
         } 
      }
      ?>
   </tbody>
</table>


<!--------------->
<!--------------->
<!-- TABELLA 3 -->
<!--------------->
<!--------------->

<div class="rowimg">
   <div class="column">
      <h2 class="titolo2" style="float:left;">Arbusti</h2>
   </div>

      <?php
         if(basename($_SERVER['PHP_SELF']) != 'parco.php') {
            ?>
            <div class="column">
               <div class="bottone">
               <a href="../Admin/form-aggiungi.php?tabella=flora&tipo=arbusto&value=1" class="btn btn-success btn-lg">
                  <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
               </a>
            </div>
         </div>
         <?php
         }
         $tabella = 'arbusti';
         include 'Searchbar.php' 
      ?>
</div>

<table id="tableData3" class="table table-bordered table-striped">
   <thead>
      <tr>
         <th>Arbusto</th>
         <th>Specie</th>
         <th>Dimensione</th>
         <th>Stagione di fioritura</th>
      </tr>
   </thead>
   <tbody>
   <?php
      $query_arbusto = "SELECT * FROM flora WHERE Categoria = 'Arbusto' AND fk_IdParco = '$parco[0]'";
      if(isset($_POST["submit_arbusti"])){
         $specieArbusto = mysqli_real_escape_string($conn, $_POST['search']);
         $query_arbusto = "SELECT * FROM flora WHERE SpecieArbusto LIKE '$specieArbusto' AND flora.fk_IdParco = '$parco[0]'";
      }
      $result_arbusto = mysqli_query($conn, $query_arbusto);
      while($arbusto = mysqli_fetch_array($result_arbusto))
      { 
         ?>
         <tr>
            <td>
               <img src=" ../../<?php echo $arbusto['path_immagine_arbusto'] ?>" id="img_tabella"></img>
            </td>
            <td><?php echo $arbusto['SpecieArbusto']?></td>
            <td><?php echo $arbusto['DimensioneArbusto']?></td> 
            <td><?php echo $arbusto['Stagione_fioritura'] ?></td>
            <td>
                  <a href="../Admin/form-modifica.php" class=" btn btn-success btn-lg">Modifica</a>
               </td>
               <td>
                  <a href="#" class=" btn btn-success btn-lg elimina">Elimina</a>
               </td>
         </tr>
         <?php
      } 
      ?>
   </tbody>
</table>


<!--------------->
<!--------------->
<!-- TABELLA 4 -->
<!--------------->
<!--------------->


<div class="rowimg">
   <div class="column">
      <h2 class="titolo2" style="float:left;">Piante erbacee</h2>
   </div>
      <?php
         if(basename($_SERVER['PHP_SELF']) != 'parco.php') {
            ?>
            <div class="column">
               <div class="bottone">
               <a href="../Admin/form-aggiungi.php?tabella=flora&tipo=piantaErbacea&value=1" class="btn btn-success btn-lg">
                  <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
               </a>
            </div>
         </div>
            <?php
         }
         $tabella = 'piante erbacee';
         include 'Searchbar.php';
   ?>
</div>

<table id="tableData4" class="table table-bordered table-striped">
   <thead>
      <tr>
         <th>Pianta erbacea</th>
         <th>Classificazione</th>
         <th>Colore</th>
         <th>Stagione di fioritura</th>
      </tr>
   </thead>
   <tbody>
   <?php
      $query_piantaErbacea = "SELECT * FROM flora WHERE Categoria = 'Pianta erbacea' AND fk_IdParco = '$parco[0]'";
      if(isset($_POST["submit_pianteErbacee"])){
         $ClassificazionePianteErbacee = mysqli_real_escape_string($conn, $_POST['search']);
         $query_piantaErbacea = "SELECT * FROM flora WHERE ClassificazionePianteErbacee LIKE '$ClassificazionePianteErbacee' AND flora.fk_IdParco = '$parco[0]'";
      }
      $result_piantaErbacea = mysqli_query($conn, $query_piantaErbacea);
      while($piantaErbacea = mysqli_fetch_array($result_piantaErbacea))
      { 
         ?>
         <tr>
            <td>
               <img src=" ../../<?php echo $piantaErbacea['path_immagine_PiantaErbacea'] ?>" id="img_tabella"></img>
            </td>
            <td><?php echo $piantaErbacea['ClassificazionePianteErbacee']?></td>
            <td><?php echo $piantaErbacea['ColorePianteErbacee']?></td> 
            <td><?php echo $piantaErbacea['Stagione_fioritura'] ?></td>
            <td>
                  <a href="../Admin/form-modifica.php" class=" btn btn-success btn-lg">Modifica</a>
               </td>
               <td>
                  <a href="#" class=" btn btn-success btn-lg elimina">Elimina</a>
               </td>
         </tr>
         <?php
      } 
      ?>
   </tbody>
</table>

<script type="text/javascript" src="../../JS/index.js"></script> 

<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData').paging({limit:5});
            });
</script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData2').paging({limit:3});
            });
</script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData3').paging({limit:3});
            });
</script>
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData4').paging({limit:3});
            });
</script>