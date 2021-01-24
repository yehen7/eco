
     <?php 
     
     //require functions
require('./header.php');
require "./database/contactEmail.php";

     ?>

<main id="main-site">


    <!--Main-->
    <main id="main-site">
      <!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row banner-content">
				<div class="col-lg-12 d-flex align-items-center justify-content-between">
					<div class="left-part">
						<h1>
							Contact Us
						</h1>
						<p>
						Need help? Tell us the good,the bad & the ugly.we are eager to hear from you.
						</p>
					</div>
					<div class="right-part">
						<a href="index.php">home</a>
						<span class="fa fa-caret-right"></span>
						<a href="contact.php">contact</a>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
 
	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<div class="row">
				<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
				<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						<div class="contact-details">
							<h5>Colombo, SRI LANKA</h5>
							<p>59/1, RATHMALANA</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-phone-handset"></span>
						</div>
						<div class="contact-details">
							<h5>+94 0472242793</h5>
							<p>Mon to Fri 9am to 6 pm</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-envelope"></span>
						</div>
						<div class="contact-details">
							<h5>ecocycle@gmail.com</h5>
							<p>Send us your query anytime!</p>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
				<form action="contact.php" method="POST">
        <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" name="name" class="form-control form-control-lg">
                 </div>

                
                <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control form-control-lg">
                </div>
                
                <div class="form-group">
                <label for="address">Subject</label>
                <input type="text" name="subject" class="form-control form-control-lg">
                </div>
                <div class="form-group">
                <label for="mobile">Message</label>
                <textarea type="textarea" name="message" class="form-control form-control-lg"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Send Message</button>
                </div>
               
        </form>
				</div>
			</div>
		</div>
	</section>
	<!-- End contact-page Area -->

    </main>
    <!--end main-->

   
<footer class="page-footer font-small blue-grey lighten-5">

<div style="background-color:		#000000">
  <div class="container">

    <!-- Grid row-->
    <div class="row py-4 d-flex align-items-center">

      <!-- Grid column -->
     

<!-- Footer Links -->
<div class="container text-center text-md-left mt-5">

  <!-- Grid row -->
  <div class="row mt-3 dark-grey-text">

    <!-- Grid column -->
    <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

      <!-- Content -->
      <h6 class="font-weight-bold white">EcoCycle</h6>
      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto white"  style="width: 60px;">
      <p> We help to reduce the pollution of mother nature by reducing the harm that happens to the environment by the harmful disposal materials that we find in our home environment. </p>

    </div>
    <!-- Grid column -->

    
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

      <!-- Links -->
      <h6 class="text-uppercase font-weight-bold white">Useful links</h6>
      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
    
      <p>
        <a class="dark-grey-text" href="store.php">Store</a>
      </p>
      <p>
        <a class="dark-grey-text" href="blog.php">Blog</a>
      </p>
      <p>
        <a class="dark-grey-text" href="about.php">About Us</a>
      </p>


    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

      <!-- Links -->
      <h6 class="text-uppercase font-weight-bold white">Contact</h6>
      <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
      <p>
        <i class="fas fa-home mr-3"></i> Western province</p>
      <p>
        <i class="fas fa-envelope mr-3"></i> ecocycle@gmail.com</p>
      <p>
        <i class="fas fa-phone mr-3"></i> 0713240163</p>
     

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<li class="list-inline-item">
      <a class="btn-floating btn-gplus mx-1">
      <img src="img/store.png"  style="max-width: 40%; ">
      </a>
    </li>

</footer>
    <!--end Footer-->
<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCs4APPDpT3CRGCgk3Cmv9xBvEK5Lq3HGo"></script>
<script src="js/maps.min.js"></script>



<!--Owl Carousel-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCs4APPDpT3CRGCgk3Cmv9xBvEK5Lq3HGo"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="js/maps.min.js"></script>
<!--Custom-->
<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="js/tilt.jquery.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/easing.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/owl-carousel-thumb.min.js"></script>
	<script src="js/hexagons.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/waypoints.min.js"></script>
>
	<script src="js/main.js"></script>
<script src="./index.js"></script>
    
</body>
</html>


<?php

include('./database/conn.php');

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $message=$_POST['message'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];


  sendEmail($email,$name);
  

  $error = null;//initializing the $error
if (empty($name)) {
$error = 'You forgot to enter a name';
}

if (empty($message)) {
$error = 'You forgot to enter a message';
}

if (empty($subject)) {
$error = 'You forgot to enter a subject';
}

if (empty($email)) {
$error= 'You forgot to enter a email';
}

if(!empty($error))//if error occured
{
   die( $error);//Stops the script and prints the errors if any occured
}
// Insert the data from the form into the DB:

$sql = "INSERT INTO contact (name,email,subject,message)
VALUES
('$name','$email','$subject','$message')";

// Enter the info the end user type if everything is ok:

if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}
else
{
echo  "<script>alert('Thank you for your feedback')</script>";
}

// Close the connection:


mysqli_close($conn);
  




}




?>
