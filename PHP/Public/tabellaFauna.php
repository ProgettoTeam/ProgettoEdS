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