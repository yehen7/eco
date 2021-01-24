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
<li class="breadcrumb-item active"><a href="company.php">Company</a> </li>


</ul>



</div>


<form action="addcompany.php" method="post" enctype="multipart/form-data" name="productform" onsubmit="return validateform()">
<h3>Add Company</h3>

  <div class="form-group">
    <label for="email">Company Name</label>
    <input type="text" class="form-control" name=" name" id="email" placeholder="add a company name">
  </div>

  <div class="form-group">
    <label for="email">Company Address</label>
    <input type="text" class="form-control" name="address" id="email" placeholder="add company address">
  </div>
  <div class="form-group">
    <label for="email">Company Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="add company email">
  </div>
  <div class="form-group">
    <label for="email">Company Tele</label>
    <input type="text" class="form-control" name="tele" id="email" placeholder="add company Telephone number">
  </div>
  <div class="form-group">
    <label for="email">Recycle Type</label>
    <input type="text" class="form-control" name="type" id="email" placeholder="add Recycle type">
  </div>
  
  <input type="submit" name="submit" class="btn btn-primary" value="Add Company"/>
</form>
<script>

function validateform()
{
    var a=document.forms['productform']['name'].value;
    
    var b=document.forms['productform']['address'].value;
    
    
    

if(a=="")
{
    alert('Title must be filled out !');
    return false;
}

if(b=="")
{
    alert('News  must be filled out !');
    return false;
}



}


</script>


<?php

include('db/conn.php');
require "./db/emailCompany.php";

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $address=$_POST['address'];
  
  $email=$_POST['email'];
  $tele=$_POST['tele'];
  $type=$_POST['type'];
  
  sendEmail($email,$address,$type,$tele,$name);
  $error = null;//initializing the $error
if (empty($name)) {
$error = 'You forgot to enter a company name!';
}

if (empty($address)) {
$error = 'You forgot to enter company address !';
}

if (empty($email)) {
$error = 'You forgot to enter a company email!';
}

if (empty($tele)) {
$error= 'You forgot enter a company telephone number';
}
if (empty($type)) {
    $error= 'You forgot enter a Recyle type';
    }
    
if(!empty($error))//if error occured
{
   die( $error);//Stops the script and prints the errors if any occured
}
// Insert the data from the form into the DB:

$sql = "INSERT INTO company (company_name,company_address,company_email,company_tele,type)
VALUES
('$name','$address','$email','$tele','$type')";

// Enter the info the end user type if everything is ok:

if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}
else
{
echo  "<script>alert('company added sucessfully')</script>";
}

// Close the connection:


mysqli_close($conn);
  




}




?>

