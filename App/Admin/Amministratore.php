<?php
include ('../DAL.php'); 
?>
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
   include ("../Navbar.php");
 ?>

<h1 class="titolo">Pagina Amministratore</h1>

<?php 
include '../Errors.php'; 
include '../Corrects.php'; 
?>

<div class="rowimg">
   <div class="column">
      <h2 class="titolo2">Parchi</h2>
   </div>

   <div class="column">
      <div class="bottone">
         <a href="Form-aggiungi.php?tabella=parco&value=1" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
         </a>
      </div>
   </div>

   
      <?php 
      $tabella='parco'; 
      include("../Public/Searchbar.php");  ?>
</div>

<?php include '../Public/TabellaParchi.php'; ?>

<!--------------->
<!--------------->
<!-- TABELLA 2 -->
<!--------------->
<!--------------->

<div class="rowimg">
   <div class="column">
      <h2 class="titolo2">Responsabili</h2>
   </div>
   <div class="column">
      <div class="bottone">
         <a href="Form-aggiungi.php?tabella=responsabile&value=1" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
         </a>
      </div>
   </div>
   
   <?php 
      $tabella='responsabile'; 
      include("../Public/Searchbar.php");  ?>

</div>
<table id="tableData2" class="table table-bordered table-striped">
   <thead>
        <tr>
          <th>Nome</th>
          <th>Cognome</th>
          <th>Email</th>
          <th>Amministratore</th>
          <th>Parco assegnato</th>
        </tr>
    </thead>
    <tbody>
        <?php
         include ('../DBconnection.php'); 
         $query_responsabile = "SELECT * FROM responsabile";
         if(isset($_POST["submit_responsabile"])){
            $cognomeResponsabile = mysqli_real_escape_string($conn, $_POST['search']);
            $query_responsabile = "SELECT * FROM responsabile WHERE Cognome LIKE '$cognomeResponsabile'";
         }
          $result_responsabile = mysqli_query($conn, $query_responsabile);
          while($row = mysqli_fetch_array($result_responsabile))
          { 
             $fieldinfo = mysqli_fetch_fields($result_responsabile);
          ?>
            <tr>
              <td><?php echo $row['Nome']?></td>
              <td><?php echo $row['Cognome']?></td>
              <td><?php echo $row['Email']?></td>
              <td>
               <?php 
                  $query_amm = "SELECT * FROM amministratore WHERE IdAmministratore =" . $row['fk_IdAmministratore'];
                  $result_amm = mysqli_query($conn, $query_amm);
                  $row_amm = mysqli_fetch_array($result_amm);
                  echo $row_amm['Cognome'];
               ?>
              </td>
              <td>
               <?php 
                  $query_par = "SELECT * FROM parco WHERE IdParco =" . $row['fk_IdParco'];
                  $result_par = mysqli_query($conn, $query_par);
                  $row_par = mysqli_fetch_array($result_par);
                  echo $row_par['Nome'];
               ?>
              </td>
              <?php 
              if(basename($_SERVER['PHP_SELF']) == 'Amministratore.php') {
                  $tab = 'responsabile';
                 include '../Admin/Button_modifica-elimina.php'; 
              }
              ?>
            </tr>
          <?php
          }
          include '../DBclose.php';
        ?>
    </tbody>
</table>

<script type="text/javascript" src="../../Js/index.js"></script> 
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData').paging({limit:5});
            });
</script>

<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData2').paging({limit:13});
            });
</script>

 <?php include ("../Footer.php")?>    
</body>
</html>