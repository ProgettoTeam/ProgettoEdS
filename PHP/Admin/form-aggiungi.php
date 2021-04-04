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
<?php include ("../navbar.php")?>

<div class="container-form-modifica">
  <div style="float:right;"> 
    <label for="cars">Righe</label>
    <select name="cars" id="cars" class="combobox">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
  </div>
  <form action="/pagina_che_gestisce.php">
  <table id="table" class="table table-bordered table-striped">
    <thead>
        <tr>
          <th>Campo1</th>
          <th>Campo2</th>
          <th>Campo3</th>
          <th>Campo4</th>
        </tr>
    </thead>
    <tbody>
        <td>
          <div class="container-img-tab" id="containerimghome">
            <a href='PHP/Public/parco.php?IdParco=<?php echo $row['IdParco'] ?>'>
              <img src="../../CSS/img_fauna/fenicottero.jpg" id="img_tabella"></img>
              <div class="overlay-tab">
                <div class="text">Modifica immagine</div>
              </div>
            </a>
          </div>
        </td>
        <td style="margin-top:45%"><input type="text" id="campoN" name="CampoN-name" placeholder="Introduci campo2"></td>
        <td><input type="text" id="campoN" name="CampoN-name" placeholder="Introduci campo3"></td>
        <td><input type="text" id="campoN" name="CampoN-name" placeholder="Introduci campo4"></td>
    </tbody>

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

<?php include ("../footer.php")?>

</body>
</html>