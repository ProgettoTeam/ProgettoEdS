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
  <form action="/pagina_che_gestisce.php">
    <label for="Campo2-name">Campo1</label>
    <input type="text" id="campo1" name="Campo1-name" placeholder="Introduci campo1">

    <label for="Campo2-name">Campo2</label>
    <input type="text" id="campo2" name="Campo2-name" placeholder="Introduci campo1">

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