<!DOCTYPE html>
<html lang="en">
<head>
      <!-- librerie importate -->
      <?php include ('../librerie.php') ?>

    <title>Parco</title>
</head>
<body>
<?php include '../navbar.php'?>

<h1 class="titolo">Nome del Parco</h1>
<div class="container-img" id="containerimg">
   <img src="../../CSS/img_parchi/parco7.jpg" class="imgparco"> </img>
   <div class="overlay" id="overlay">
      <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu leo ultricies, sollicitudin sapien tincidunt, viverra metus.</div>
      </div>
</div>


<h2 class="titolo" style="padding-bottom:0% !important;">Luogo</h2>
<p class="paragrafo"> 
Lorem ipsum dolor sit amet, consectetur adipiscing elit.</n>
Curabitur eu leo ultricies, sollicitudin sapien tincidunt, viverra metus.
</p>

<!--------------->
<!--------------->
<!-- TABELLA 1 -->
<!--------------->
<!--------------->

<div class="rowimg">
   <div class="columnbtn">
      <h2 class="titolo2" style="float:left;">Flora</h2>
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
<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData2').paging({limit:7});
            });
</script>
<?php include '../footer.php'?>
</body>
</html>