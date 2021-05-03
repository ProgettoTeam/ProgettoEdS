<?php
include '../DAL.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HELP | ParchiNazionali</title>
    <?php include '../Librerie.php'; ?>
<head>
<body>
<?php include '../Navbar.php'; ?>
<div class="image-help-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="lg-text h1-aboutus">HELP & CONTACT US</h1>
                    <p class="image-aboutus-para p-aboutus">Per qualsiasi cosa siamo a tua disposizione!</p>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="container-contact">
	<div class="map" id="map_help">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d112061.09262729759!2d77.208022!3d28.632485!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x644e33bc3def0667!2sIndior+Tours+Pvt+Ltd.!5e0!3m2!1sen!2sus!4v1527779731123" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<div class="contact-form">
		<h1 class="title">CONTATTACI</h1>
		<h2 class="subtitle">Questo spazio è dedicato a risovere tutti i tuoi dubbi e problemi!</h2>
        <h2 class="subtitle">Per inviarci una mail con i tuoi dubbi o problemi premi il tasto sottostante e il nostro operatore sarà lieto di risponderti!</h2>
		<form action="mailto:amministratore.parchi.helpdesk3@gmail.com"> 
		
			<button class="btn-send"  >Invia la tua richiesta </button>
		</form>
	</div>
</div>
<script type="text/javascript" src="../../Js/index.js"></script> 

    <?php include '../Footer.php'; ?>
</body>

</html>