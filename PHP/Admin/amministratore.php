<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include ('../librerie.php') ?>

    <title>Amministratore</title>
</head>
<body>
 <?php 
 include ("../navbar.php");
 include '../DBconnection.php'; 
 ?>

<h1 class="titolo">Pagina Amministratore</h1>

<div class="rowimg">
   <div class="columnbtn">
      <h2 class="titolo2">Parchi</h2>
   </div>

   <div class="columnbtn">
      <div class="bottone">
         <a href="form-aggiungi.php?tabella=parco" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
         </a>
      </div>
   </div>
</div>

<table id="tableData" class="table table-bordered table-striped">
   <thead>
        <tr>
          <th>Parco</th>
          <th>Nome</th>
          <th>Luogo</th>
          <th>Latitudine</th>
          <th>Longitudine</th>
          <th>Descrizione</th>
          <th>Amministratore</th>
        </tr>
    </thead>
    <tbody>
        <?php
          $query_parco = "SELECT * FROM parco";
          $result_parco = mysqli_query($conn, $query_parco);
          while($row = mysqli_fetch_array($result_parco))
          { 
          ?>
            <tr>
              <td>
                    <img src=" ../../<?php echo $row['path_immagine'] ?>" id="img_tabella"></img>
              </td>
              <td><?php echo $row['Nome']?></td>
              <td><?php echo $row['Luogo']?></td>
              <td><?php echo $row['Latitudine']?></td>
              <td><?php echo $row['Longitudine']?></td>
              <td><?php echo $row['Descrizione']?></td>
              <td>
              <?php 
                  $query_amm = "SELECT * FROM amministratore WHERE IdAmministratore =" . $row['fk_IdAmministratore'];
                  $result_amm = mysqli_query($conn, $query_amm);
                  $row_amm = mysqli_fetch_array($result_amm);
                  echo $row_amm['Cognome'];
               ?>
              </td>
            </tr>
          <?php
          }
          include '../DBclose.php';
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
      <h2 class="titolo2">Responsabili</h2>
   </div>

   <div class="columnbtn">
      <div class="bottone">
         <a href="form-aggiungi.php?tabella=responsabile" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-plus-sign"></span> Aggiungi 
         </a>
      </div>
   </div>
</div>
<table id="tableData2" class="table table-bordered table-striped">
   <thead>
        <tr>
          <th>Nome</th>
          <th>Cognome</th>
          <th>Email</th>
          <th>Password</th>
          <th>Amministratore</th>
          <th>Parco assegnato</th>
        </tr>
    </thead>
    <tbody>
        <?php
         include '../DBconnection.php'; 
          $query_responsabile = "SELECT * FROM responsabile";
          $result_responsabile = mysqli_query($conn, $query_responsabile);
          while($row = mysqli_fetch_array($result_responsabile))
          { 
          ?>
            <tr>
              <td><?php echo $row['Nome']?></td>
              <td><?php echo $row['Cognome']?></td>
              <td><?php echo $row['Email']?></td>
              <td><?php echo $row['Password']?></td>
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
            </tr>
          <?php
          }
          include '../DBclose.php';
        ?>
    </tbody>
</table>

<script type="text/javascript" src="../../JS/index.js"></script> 
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData').paging({limit:5});
            });
</script>

<script type="text/javascript" src="../../JS/index.js"></script> 
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData2').paging({limit:13});
            });
</script>

 <?php include ("../footer.php")?>    
</body>
</html>