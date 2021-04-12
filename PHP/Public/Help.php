<?php
include '../DAL.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php include '../librerie.php' ?>
<body>
<?php include '../navbar.php'; ?>
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
	<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d112061.09262729759!2d77.208022!3d28.632485!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x644e33bc3def0667!2sIndior+Tours+Pvt+Ltd.!5e0!3m2!1sen!2sus!4v1527779731123" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<div class="contact-form">
		<h1 class="title">CONTATTACI</h1>
		<h2 class="subtitle">Se hai bisogno di aiuto noi siamo qui per te!</h2>
		<form action="">
			<input type="text" name="name" placeholder="Your Name" />
			<input type="email" name="e-mail" placeholder="Your E-mail Adress" />
			<input type="tel" name="phone" placeholder="Your Phone Number"/>
			<textarea name="text" id="" rows="8" placeholder="Your Message"></textarea>
			<button class="btn-send">Invia la tua richiesta </button>
		</form>
	</div>
</div>
    <?php include '../footer.php'; ?>
</body>

</html>