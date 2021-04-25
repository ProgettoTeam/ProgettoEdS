<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <?php
      if(basename($_SERVER['PHP_SELF']) == 'index.php') {
      ?>
        <img src="Css/logo-flora-fauna.png" class="logo">
      <?php
      } else {
      ?>
        <img src="../../Css/logo-flora-fauna.png" class="logo">
      <?php
      }
      ?>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <?php
        if(basename($_SERVER['PHP_SELF']) != 'index.php') {
        ?>
          <li><a href="../../index.php">Home</a></li>
        <?php
        }

        if(basename($_SERVER['PHP_SELF']) == 'index.php') {
        ?>
          <li><a href="App/Public/Aboutus.php">About Us</a></li>
        <?php
        } else if(basename($_SERVER['PHP_SELF']) != 'Aboutus.php'){
          ?>
          <li><a href="../Public/Aboutus.php">About Us</a></li>
        <?php
        }

        if(basename($_SERVER['PHP_SELF']) == 'index.php') {
          ?>
            <li><a href="App/Public/Help.php">Help</a></li>
          <?php
          } else if(basename($_SERVER['PHP_SELF']) != 'Help.php'){
            ?>
            <li><a href="../Public/Help.php">Help</a></li>
          <?php
          }
        ?>
        <?php include 'Amministratore-responsabile.php'; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php 
        $navbar = 1;
        include ('SessionLogin.php') 
      ?>
      </ul>
    </div>
  </div>
</nav>
