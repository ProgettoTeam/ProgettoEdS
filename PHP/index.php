<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!-- librerie importate -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../JS/index.js"></script>

    
  
    <!-- ###################### -->
    
    
    <title>HomePage</title>
</head>


<body>
  <?php include 'navbar.php'?>


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
        <img src="../CSS/foto-motivazionale-1.jpg" style="width:100%;height:100%;">
      </div>

      <div class="item">
        <img src="../CSS/foto-motivazionale-2.jpg" style="width:100%;height:100%;";>
      </div>
    
      <div class="item">
        <img src="../CSS/foto-motivazionale-3.jpg" style="width:100%;height:100%;">
      </div>

      <div class="item">
        <img src="../CSS/foto-motivazionale-4.jpg" style="width:100%;height:100%;">
      </div>
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
    <div class="flip-box-front">
      <img src="../CSS/foto-motivazionale-1.jpg" alt="Paris" style="width:100%;height:100%">
    </div>
    <div class="flip-box-back">
      <h2>Foto-1</h2>
      <p>Descrizione-1</p>
    </div>
  </div>
</div>
  </div>
  <div class="columnimg">
  <div class="flip-box">
  <div class="flip-box-inner">
    <div class="flip-box-front">
      <img src="../CSS/foto-motivazionale-2.jpg" alt="Paris" style="width:100%;height:100%">
    </div>
    <div class="flip-box-back">
      <h2>Foto-2</h2>
      <p>Descrizione-2</p>
    </div>
  </div>
</div>
  </div>
</div>

<h2 class="titolo">Viualizza qui i Parchi:</h2>
<div id="map"></div>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVmxa27-uGFIPD7pW_P5l0mxsXglRxpos&callback=initMap&libraries=&v=weekly"
    async
  ></script>

  <?php include 'footer.php'?>

</body>



</html>


<!-- visualizza questo sito https://mdbootstrap.com/docs/standard/components/carousel/ -->