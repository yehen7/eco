<html>
<head>
    <title>Retrieve data</title>
</head>
<body>
<div id="user">
    <h2>Enter name of user to get information</h2>
 

    <p>quantity: <strong id="name"></strong></p>
    <p>type: <strong id="gender"></strong></p>
    

</div>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>


<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
     <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-database.js"></script>

<script>
    // Your web app's Firebase configuration
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

    var ref = firebase.database().ref("Users/PickupDetails");

ref.on("value", function(snapshot) {
   console.log(snapshot.val());
}, function (error) {
   console.log("Error: " + error.code);
});
</script>
<script type="text/javascript" src="readData.js"></script>
<script type="text/javascript" src="read.js"></script>
</body>
</html>