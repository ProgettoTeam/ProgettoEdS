<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!-- librerie importate -->

    <?php  include("PHP/librerie.php");?>
    
    <title>HomePage</title>
</head>

<?php
  include 'PHP/classeParchi.php';
  $parco = new parchi;
  $all_parchi = $parco->getParchi();
  $json_all_parchi = json_encode($all_parchi);
  echo '<div id="all_parchi">' . $json_all_parchi . '</div>';
?>


<body>
  <?php include 'PHP/navbar.php'?>
  <div class="body-container">
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="CSS/img_carusel/img1.jpg" class="img-carousel">
        </div>

        <div class="item">
          <img src="CSS/img_carusel/img2.jpg" class="img-carousel";>
        </div>
      
        <div class="item">
          <img src="CSS/img_carusel/img3.jpg" class="img-carousel">
        </div>

        <div class="item">
          <img src="CSS/img_carusel/img4.jpg" class="img-carousel">
        </div>
      </div>
      <div class="carousel-caption">
        <h3> Troverai di più nei boschi che nei libri.</br>
            Animali e alberi ti insegneranno ciò che non si può imparare dai maestri.
        </h3>
        
  </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="titolo">
    <h1>I 2 Parchi più grandi d'Italia</h1>
  </div>


  <!-- prova hoverlay img -->
  <div class="rowimg">
    <div class="columnimg">
      <div class="flip-box">
        <div class="flip-box-inner">
        <?php
          $conn = mysqli_connect("localhost", "parco", "", "parco");
          $query_parco1 = "SELECT * FROM parco WHERE Nome='Methocarbamol'";
          $result = mysqli_query($conn, $query_parco1);
          $row = mysqli_fetch_array($result)
        ?>
      <div class="flip-box-front">
        <img src="<?php echo $row['path_immagine'] ?>" alt="ParcoGrande1" class="ParcoGrande">
      </div>
      <div class="flip-box-back">
        <h2>Gigashots</h2>
        <p><?php echo $row['Descrizione'] ?></p>
        <a href=# style:"padding-top: 80px">Visita</a>
      </div>
    </div>
  </div>
    </div>
    <div class="columnimg">
    <div class="flip-box">
    <div class="flip-box-inner">
      <div class="flip-box-front">
        <?php
          $query_parco2 = "SELECT * FROM parco WHERE Nome='Neomycin Sulfate'";
          $result = mysqli_query($conn, $query_parco2);
          $row = mysqli_fetch_array($result)
        ?>
        <img src="<?php echo $row['path_immagine'] ?>" alt="ParcoGrande2" class="ParcoGrande">
      </div>
      <div class="flip-box-back">
        <h2>Wikivu</h2>
        <p><?php echo $row['Descrizione'] ?></p>
        <a href=#>Visita</a>
      </div>
    </div>
  </div>
    </div>
  </div>

  <h2 class="titolo">Viualizza qui i Parchi sulla mappa:</h2>

  <div id="map"></div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVmxa27-uGFIPD7pW_P5l0mxsXglRxpos&callback=initMap&libraries=&v=weekly"
      async>
    </script>

    <!-- titolo e searchbox -->
    <!-- ------------------ -->
  <div class="rowimg">
   <div class="columnbtn">
      <h2 class="titolo2" style="float:left;">Tabella Parchi:</h2>
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
          <th>Parco</th>
          <th>Nome</th>
          <th>Luogo</th>
          <th>Descrizione</th>
        </tr>
    </thead>
    <tbody>
        <?php
          $query_all = "SELECT * FROM parco";
          $result = mysqli_query($conn, $query_all);
          while($row = mysqli_fetch_array($result))
          { 
          ?>
            <tr>
              <td>
                <a href=#>
                  <img src=" <?php echo $row['path_immagine'] ?>" id="img_tabella"></img>
                  <p id="overlay_home">Visita</p>
                </a>
              </td>
              <td><?php echo $row['Nome']?></td>
              <td><?php echo $row['Luogo']?></td>
              <td><?php echo $row['Descrizione']?></td>
            </tr>
          <?php
          }
        ?>
    </tbody>
  </table>

  <script type="text/javascript" src="JS/index.js"></script> 
  <script type="text/javascript">
              $(document).ready(function() {
                  $('#tableData').paging({limit:5});
              });
  </script>

    <?php include 'PHP/footer.php'?>

</body>



</html>


<!-- visualizza questo sito https://mdbootstrap.com/docs/standard/components/carousel/ -->
