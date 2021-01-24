<?php

session_start();

if($_SESSION['email']==true)
{

}
else

header('location:admin_login.php');
$page='news';
include('header.php');

?>

<div style="width:70%; margin-left:25%; margin-top:5%">
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item active"><a href="home.php">Home</a> </li>
<li class="breadcrumb-item active"><a href="collectors.php">Collectors</a> </li>


</ul>



</div>


<form action="addcollector.php" method="post" enctype="multipart/form-data" name="productform" onsubmit="return validateform()">
<h3>Add Collector</h3>

  <div class="form-group">
    <label for="email">Collector  Name</label>
    <input type="text" class="form-control" name=" name" id="email" placeholder="add a collector name">
  </div>

  <div class="form-group">
    <label for="email">Collector NIC</label>
    <input type="text" class="form-control" name="nic" id="email" placeholder="add Collector NIC">
  </div>
  <div class="form-group">
    <label for="email">Vehicle Type</label>
    <input type="text" class="form-control" name="type" id="email" placeholder="add Vehicle Type">
  </div>
  <div class="form-group">
    <label for="email">Mobile Number</label>
    <input type="text" class="form-control" name="tele" id="email" placeholder="add Mobile number">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="add Collector Email">
  </div>
  
  <input type="submit" name="submit" class="btn btn-primary" value="Add Collector"/>
</form>
<script>

function validateform()
{
    var a=document.forms['productform']['name'].value;
    
    var b=document.forms['productform']['email'].value;
    
    
    

if(a=="")
{
    alert('Title must be filled out !');
    return false;
}





}


</script>


<?php

include('db/conn.php');
require "./db/emailCollector.php";

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $nic=$_POST['nic'];
  
  $email=$_POST['email'];
  $tele=$_POST['tele'];
  $type=$_POST['type'];
  
  sendEmail($email,$nic,$type,$tele,$name);


  $error = null;//initializing the $error
if (empty($name)) {
$error = 'You forgot to enter a collector name!';
}

if (empty($email)) {
$error = 'You forgot to enter a collector email!';
}

if (empty($tele)) {
$error= 'You forgot enter a company mobile number';
}
if (empty($type)) {
    $error= 'You forgot enter Vehicle type';
    }
    
if(!empty($error))//if error occured
{
   die( $error);//Stops the script and prints the errors if any occured
}
// Insert the data from the form into the DB:

$sql = "INSERT INTO collector (collector_name,collector_nic,vehicle_type,mobile_no,email)
VALUES
('$name','$nic','$type','$tele','$email')";

// Enter the info the end user type if everything is ok:

if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}
else
{
echo  "<script>alert('collector added sucessfully')</script>";
}

// Close the connection:


mysqli_close($conn);
  




}




?>

