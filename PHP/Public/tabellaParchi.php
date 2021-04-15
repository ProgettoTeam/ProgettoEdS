<table id="tableData" class="table table-bordered table-striped">
   <thead>
        <tr>
          <th>Parco</th>
          <th>Nome</th>
          <th>Luogo</th>
          <?php
          if(basename($_SERVER['PHP_SELF']) == 'amministratore.php') {
          ?>
            <th>Latitudine</th>
            <th>Longitudine</th>
          <?php
          }
          ?>
          <th>Descrizione</th>
          <?php
          if(basename($_SERVER['PHP_SELF']) == 'amministratore.php') {
          ?>
            <th>Amministratore</th>
          <?php
          }
          ?>
        </tr>
    </thead>
    <tbody>
        <?php
          $query_parco = "SELECT * FROM parco";
          if(isset($_POST["submit_parco"])){
            $nomeParco = mysqli_real_escape_string($conn, $_POST['search']);
            $query_parco = "SELECT * FROM parco WHERE Nome LIKE '$nomeParco'";
          }
          $result_parco = mysqli_query($conn, $query_parco);
          $fieldinfo = mysqli_fetch_fields($result_parco);
          while($row = mysqli_fetch_array($result_parco))
          { 
          ?>
            <tr>
              <td>
                  <?php
                    if(basename($_SERVER['PHP_SELF']) == 'amministratore.php') {
                    ?>
                        <img src=" ../../<?php echo $row['path_immagine'] ?>" id="img_tabella"></img>
                    <?php
                    } else {
                    ?>
                      <div class="container-img-tab" id="containerimghome">
  
                        <a href='PHP/Public/parco.php?IdParco=<?php echo $row['IdParco'] ?>'>
                          <img src=" <?php echo $row['path_immagine'] ?>" id="img_tabella"></img>
                          <div class="overlay-tab">
                          <div class="text">Visita il Parco</div>
                          </div>
                        </a>

                      </div>
                    <?php
                    }
                  ?>
              </td>
              <td><?php echo $row['Nome']?></td>
              <td><?php echo $row['Luogo']?></td>
              <?php
              if(basename($_SERVER['PHP_SELF']) == 'amministratore.php') {
              ?>
                <td><?php echo $row['Latitudine']; ?></td>
                <td><?php echo $row['Longitudine']; ?></td>
              <?php
              }
              ?>
              <td><?php echo $row['Descrizione']?></td>
              <?php
              if(basename($_SERVER['PHP_SELF']) == 'amministratore.php') {
              ?>
                <td>
                <?php 
                    $query_amm = "SELECT * FROM amministratore WHERE IdAmministratore =" . $row['fk_IdAmministratore'];
                    $result_amm = mysqli_query($conn, $query_amm);
                    $row_amm = mysqli_fetch_array($result_amm);
                    echo $row_amm['Cognome'];
                ?>
                </td>
              <?php
              }
              ?>
              <?php
                  if(basename($_SERVER['PHP_SELF']) == 'amministratore.php') {
                    $tab = 'parco';
                    include '../Admin/Button_modifica-elimina.php';
                  }
               ?>
            </tr>
          <?php
          }
          if(basename($_SERVER['PHP_SELF']) == 'amministratore.php') {
            include '../DBclose.php';
          } else {
            include 'PHP/DBclose.php';
          }
        ?>
    </tbody>
</table>