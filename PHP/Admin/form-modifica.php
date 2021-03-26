<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="../../CSS/style.css">
    <script src="../../JS/index.js"></script>
    
    
    <!-- jQuery -->
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
   <!-- jQuery UI -->
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
   
    <title>Form-Modifica</title>
</head>
<body>
<?php include ("../navbar.php")?>

<div class="container-form-modifica">
  <form action="/pagina_che_gestisce.php">
    <label for="Campo2-name">Campo1</label>
    <input type="text" id="campo1" name="Campo1-name" value="<?php echo("#Introduci campo1") ?>">

    <label for="Campo2-name">Campo2</label>
    <input type="text" id="campo2" name="Campo2-name" value="<?php echo("#Introduci campo2") ?>">

    <!-- se vuoi creare altri campi copia questi elementi 
    
    <label for="CampoN-name">CampoN</label>
    <input type="text" id="campoN" name="CampoN-name" value=" <?php /* echo("#Introduci campoN") */?>">
    -->

    <div class="rowimg">
   <div class="columnbtn">
        <input type="submit" value="Annulla" name="annulla">
   </div>

   <div class="columnbtn">
      <input type="submit" value="Modifica" name="modifica">
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