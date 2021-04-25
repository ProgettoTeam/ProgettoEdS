<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
          </div>
         
          <div class="col-xs-6 col-md-4 left">
            <h6>Quick Links</h6>
            <ul class="footer-links list-unstyled quick-links">
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
              include 'Amministratore-responsabile.php'; 
              $navbar = 0;
              include ('SessionLogin.php') 
              ?>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by <a href="#<!--mettere link home-->">Flora&Fauna</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
</footer>


