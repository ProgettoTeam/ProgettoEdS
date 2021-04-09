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
        <img src="CSS/logo-flora-fauna.png" class="logo">
      <?php
      } else {
      ?>
        <img src="../../CSS/logo-flora-fauna.png" class="logo">
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
      ?>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Help</a></li>
        <?php include 'amministratore-responsabile.php'; ?>
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
