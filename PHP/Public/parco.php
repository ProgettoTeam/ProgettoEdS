<!DOCTYPE html>
<html lang="en">
<head>
      <!-- librerie importate -->
      <?php include ('../librerie.php') ?>

    <title>Parco</title>
</head>
<body>
<?php 
   $IdParco = $_GET["IdParco"];
   $conn = mysqli_connect("localhost", "parco", "", "parco");
   $query = "SELECT * FROM parco WHERE IdParco=$IdParco";
   $result = mysqli_query($conn, $query);
   $parco = mysqli_fetch_array($result)
?>
<?php include '../navbar.php'?>

<h1 class="titolo"><?php echo $parco[1] ?></h1>
<div class="container-img">
   <img src="../../<?php echo $parco[6] ?>" class="imgparco"> </img>
   <div class="overlay">
      <div class="text"><?php echo $parco[5] ?></div>
      </div>
</div>


<h2 class="titolo" style="padding-bottom:0% !important;">Luogo</h2>
<p class="paragrafo"> <?php echo $parco[2] ?></p>

<!--------------->
<!--------------->
<!-- TABELLA 1 -->
<!--------------->
<!--------------->

<div class="rowimg">
   <div class="columnbtn">
      <h2 class="titolo2" style="float:left;">Fauna</h2>
   </div>

   <div class="columnbtn">
      <div class="bottone">
            <div class="search-container">
                <form>
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
        </div>
      </div>
   </div>
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
      $result = mysqli_query($conn, $query_fauna);
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
      ?>
   </tbody>
</table>


<!--------------->
<!--------------->
<!-- TABELLA 2 -->
<!--------------->
<!--------------->

<div class="rowimg">
   <div class="columnbtn">
      <h2 class="titolo2" style="float:left;">Alberi</h2>
   </div>

   <div class="columnbtn">
      <div class="bottone">
            <div class="search-container">
                <form>
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
        </div>
      </div>
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
      $result_albero = mysqli_query($conn, $query_albero);
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
         </tr>
         <?php
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
   <div class="columnbtn">
      <h2 class="titolo2" style="float:left;">Arbusti</h2>
   </div>

   <div class="columnbtn">
      <div class="bottone">
            <div class="search-container">
                <form>
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
        </div>
      </div>
   </div>
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
   <div class="columnbtn">
      <h2 class="titolo2" style="float:left;">Piante erbacee</h2>
   </div>

   <div class="columnbtn">
      <div class="bottone">
            <div class="search-container">
                <form>
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
        </div>
      </div>
   </div>
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
      $query_arbusto = "SELECT * FROM flora WHERE Categoria = 'Pianta erbacea' AND fk_IdParco = '$parco[0]'";
      $result_arbusto = mysqli_query($conn, $query_arbusto);
      while($arbusto = mysqli_fetch_array($result_arbusto))
      { 
         ?>
         <tr>
            <td>
               <img src=" ../../<?php echo $arbusto['path_immagine_PiantaErbacea'] ?>" id="img_tabella"></img>
            </td>
            <td><?php echo $arbusto['ClassificazionePianteErbacee']?></td>
            <td><?php echo $arbusto['ColorePianteErbacee']?></td> 
            <td><?php echo $arbusto['Stagione_fioritura'] ?></td>
         </tr>
         <?php
      } 
      ?>
   </tbody>
</table>


<!-- jquery -->


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
<?php include '../footer.php'?>
</body>
</html>