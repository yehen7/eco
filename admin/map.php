
<?php

session_start();
error_reporting(0);


if($_SESSION['email']==true)
{

}
else

    header('location:admin_login.php');
    $page='news';
include('header.php');




?>


<!DOCTYPE html>
<html>
<body>

<h1>User Locations</h1>

<div id="googleMap" style="width:100%;height:500px;"></div>



<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>


<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
     <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-database.js"></script>


<script>
    var lat, lng;
  
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyAWIFPaypkUsWV53e15w2klf0xG43GV7UE",
    authDomain: "uberapp-1cfd9.firebaseapp.com",
    databaseURL: "https://uberapp-1cfd9.firebaseio.com/",
    projectId: "uberapp-1cfd9",
    storageBucket: "uberapp-1cfd9.appspot.com",
    messagingSenderId: "461038984754",
    appId: "1:461038984754:web:51983b3b146672538ea62b",
    measurementId: "G-LMBNDC63LR"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

  var database = firebase.database();
  var ref = database.ref('Users/');

  ref.on('value', function(snapshot){

    var options = {
     zoom: 7,
       center: {
       lat:7.8731,
       lng:80.7718
     }
   }
   
   
   var map = new google.maps.Map(document.getElementById('googleMap'), options);


      console.log(snapshot.val());
      var coords = snapshot.val();
      var keys = Object.keys(coords);

     for(var i=0; i< keys.length; i++){

      var k = keys[i];
       lat = coords[k].latitude;
       lng = coords[k].longitude;
      console.log(lat);
      console.log(lng);
       
    
   
   var markerPosition = {lat:lat, lng:lng};
   var marker = new google.maps.Marker({
     position: markerPosition,
     map: map,
     title: k
   });
   
}
   


  } , function(error){
        console.log("Error" + error.code);
  });


</script>

<!--key=API key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6zCw2kaED3ZMtTxWz2uEvf6vJwyoHVXY&callback=initMap" async defer></script>


</body>
</html>