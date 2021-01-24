<?php

session_start();
error_reporting(0);


if($_SESSION['email']==true)
{

}
else

    header('location:admin_login.php');
    $page='admin';
include('header.php');




?>


<div style="width:70%; margin-left:25%; margin-top:5%">
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item active"><a href="home.php">Home</a> </li>
<li class="breadcrumb-item active"><a href="admin.php">Admin Panel</a> </li>


</ul>



</div>


<form action="addadmin.php" method="post"  name="adminform" onsubmit="return validateform()">
<h3>Add Admin</h3>

  <div class="form-group">
    <label for="email">Name</label>
    <input type="text" class="form-control" name="name" id="email" placeholder="Enter your name">
  </div>
  
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name=" email" id="email">
  </div>
  <div class="form-group">
    <label for="email">Password</label>
    <input type="password" class="form-control" name=" password" id="email">
  </div>
 
  <input type="submit" name="submit" class="btn btn-primary" value="Register"/>
</form>
<script>

function validateform()
{
    var a=document.forms['adminform']['name'].value;
    
    var b=document.forms['adminform']['email'].value;
    
    var c=document.forms['adminform']['password'].value;
    
    

if(a=="")
{
    alert('name must be filled out !');
    return false;
}

if(b=="")
{
    alert(' email must be filled out !');
    return false;
}


}


</script>


<?php

include('db/conn.php');

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  

  

  $error = null;//initializing the $error
if (empty($name)) {
$error = 'You forgot to enter a name!';
}

if (empty($email)) {
$error = 'You forgot to enter a email!';
}

if (empty($password)) {
$error = 'You forgot to enter a password!';
}



if(!empty($error))//if error occured
{
   die( $error);//Stops the script and prints the errors if any occured
}
// Insert the data from the form into the DB:

$sql = "INSERT INTO admin (name,email,password)
VALUES
('$name','$email','$password')";

// Enter the info the end user type if everything is ok:

if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}
else
{
echo  "<script>alert('Registerd sucessfully')</script>";
}

// Close the connection:


mysqli_close($conn);
  




}




?>



