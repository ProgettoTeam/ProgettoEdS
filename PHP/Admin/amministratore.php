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

    <title>Amministratore</title>
</head>
<body>
 <?php include ("../navbar.php")?>

<h1 class="titolo">Pagina Amministratore</h1>

<h2 class="titolo2">Flora</h2>
<table id="tableData" class="table table-bordered table-striped">
   <thead>
      <tr>
         <th>id</th>
         <th>first name</th>
         <th>surname</th>
         <th>number</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>1</td>
         <td>Frank</td>
         <td>Shoulder</td>
         <td>1246</td>
      </tr>
      <tr>
         <td>2</td>
         <td>John</td>
         <td>Jameson</td>
         <td>4564</td>
      </tr>
      <tr>
         <td>3</td>
         <td>Philip</td>
         <td>Jenkins</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>4</td>
         <td>Maria</td>
         <td>Carlston</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>5</td>
         <td>Julia</td>
         <td>Tampelton</td>
         <td>1246</td>
      </tr>
      <tr>
         <td>6</td>
         <td>Jane</td>
         <td>Conor</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>7</td>
         <td>Susan</td>
         <td>Crane</td>
         <td>1246</td>
      </tr>
      <tr>
         <td>8</td>
         <td>Lucas</td>
         <td>Fenric</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>8</td>
         <td>Mark</td>
         <td>Fenric</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>9</td>
         <td>Hilde</td>
         <td>Mayer</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>10</td>
         <td>John</td>
         <td>Tron</td>
         <td>1246</td>
      </tr>
      <tr>
         <td>11</td>
         <td>Hans</td>
         <td>Stark</td>
         <td>4564</td>
      </tr>
   </tbody>
</table>

<!--------------->
<!--------------->
<!-- TABELLA 2 -->
<!--------------->
<!--------------->

<h2 class="titolo2">Fauna</h2>

<table id="tableData2" class="table table-bordered table-striped">
   <thead>
      <tr>
         <th>id</th>
         <th>first name</th>
         <th>surname</th>
         <th>number</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>1</td>
         <td>Frank</td>
         <td>Shoulder</td>
         <td>1246</td>
      </tr>
      <tr>
         <td>2</td>
         <td>John</td>
         <td>Jameson</td>
         <td>4564</td>
      </tr>
      <tr>
         <td>3</td>
         <td>Philip</td>
         <td>Jenkins</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>4</td>
         <td>Maria</td>
         <td>Carlston</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>5</td>
         <td>Julia</td>
         <td>Tampelton</td>
         <td>1246</td>
      </tr>
      <tr>
         <td>6</td>
         <td>Jane</td>
         <td>Conor</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>7</td>
         <td>Susan</td>
         <td>Crane</td>
         <td>1246</td>
      </tr>
      <tr>
         <td>8</td>
         <td>Lucas</td>
         <td>Fenric</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>8</td>
         <td>Mark</td>
         <td>Fenric</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>9</td>
         <td>Hilde</td>
         <td>Mayer</td>
         <td>4456</td>
      </tr>
      <tr>
         <td>10</td>
         <td>John</td>
         <td>Tron</td>
         <td>1246</td>
      </tr>
      <tr>
         <td>11</td>
         <td>Hans</td>
         <td>Stark</td>
         <td>4564</td>
      </tr>
   </tbody>
</table>

<script type="text/javascript" src="../../JS/index.js"></script> 
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData').paging({limit:7});
            });
</script>

<script type="text/javascript" src="../../JS/index.js"></script> 
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData2').paging({limit:7});
            });
</script>

 <?php include ("../footer.php")?>    
</body>
</html>