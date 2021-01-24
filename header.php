<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco-cycle</title>
    <!--Bootstap-->
    <link rel="icon" href="./assets/pin.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  <!--Bootstrap-->

    <!--Owl carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
   
     <!--Font -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
     <link rel="stylesheet" href="css/linearicons.css">
     <script type="text/javascript" src="js/JQuery3.3.1.js"></script>
<script type="text/javascript" src="js/lightslider.js"></script>
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/hexagons.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/templatemo-style.css">
     <!--custom-->
     <link rel="stylesheet" href="stylish.css">
     <link rel="stylesheet" href="owl.css">
     <link rel="stylesheet" href="css/material-dashboard.css">
     <?php 
     
     //require functions
     require('./functions.php');

     ?>
</head>
<body>
    <!--Header-->
    <header id="header">

     

     </div>   
     <!--navbar-->

     <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #000000;  ">
     <a class="navbar-brand" href="index.php" style="max-width: 3%;  ">
    <img src="./assets/pin.png" class="img-fluid">
 </a>
   
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav m-auto font-rubik">
            <li class="nav-item ">
              <a class="nav-link" href="store.php">Store</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact us</a>
            </li>
            
          </ul>
          <form action="#" class="font-size-14 font-raleway">
            <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
              <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
              <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
            </a>

          </form>

        </div>
      </nav>
    </header>
    <main id="main-site">
