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

<?php 
include('db/conn.php');

$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from collector where id='$id'");
while($row=mysqli_fetch_array($query))
{
    $id=$row['id'];
   
  $name=$row['collector_name'];
  $nic=$_POST['collector_nic'];
  
  $email=$row['vehicle_type'];
  $tele=$row['mobile_no'];
  $type=$row['email'];
    
}



?>

<div style="width:70%; margin-left:25%; margin-top:5%">
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item active"><a href="home.php">Home</a> </li>
<li class="breadcrumb-item active"><a href="collector.php">Collectors</a> </li>


</ul>



</div>


<form action="editcollector.php" method="post" enctype="multipart/form-data" name="productform" onsubmit="return validateform()">
<h3>Update Collector</h3>

  <div class="form-group">
  <label for="email">Collector  Name</label>
    <input type="text" class="form-control" value="<?php echo $name; ?>" name="name" id="email" placeholder="add a collector name">
  </div>
 
  <div class="form-group">

  <label for="email">Collector NIC</label>
    <input type="text" class="form-control" value="<?php echo $nic; ?>" name="nic" id="email" placeholder="add collector NIC">
  </div>
  <div class="form-group">
  <label for="email">Vehicle Type</label>
    <input type="text" class="form-control" value="<?php echo $type; ?>" name="type" id="email" placeholder="add Vehicle Type">
  </div>
  <div class="form-group">
  <label for="email">Mobile Number</label>
    <input type="text" class="form-control" value="<?php echo $tele; ?>" name="tele" id="email" placeholder="add Mobile number">
  </div>
  <div class="form-group">
  <label for="email">Email</label>
    <input type="text" class="form-control" value="<?php echo $email ?>" name="email" id="email" placeholder="add collector email">
  </div>

  <input type="hidden" name="id" value="<?php  echo $_GET['edit']; ?>">
  <input type="submit" name="submit" class="btn btn-primary" value="Update"/>
</form>
<script>

function validateform()
{
    var a=document.forms['productform']['name'].value;
    
    var b=document.forms['productform']['nic'].value;
    
    var c=document.forms['productform']['email'].value;
    
    var d=document.forms['productform']['tele'].value;

if(a=="")
{
    alert('company name must be filled out !');
    return false;
}

if(b=="")
{
    alert('nic  must be filled out !');
    return false;
}



}


</script>
</div>

<?php

include('db/conn.php');


if(isset($_POST['submit'])){
    
    $name=$_POST['name'];
    $nic=$_POST['nic'];
    
    $email=$_POST['email'];
    $tele=$_POST['tele'];
    $type=$_POST['type'];
    
  
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
  
  $sql = "update collector set collector_name='$name',collector_nic='$nic',vehicle_type='$type',mobile_no='$tele',email='$email' where id='$id'"
  ;
  
  // Enter the info the end user type if everything is ok:

if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}
else
{
echo  "<script>alert('Collector updated sucessfully')</script>";
echo "<script>window.location='http://localhost/eco/admin/collectors.php';</script>";
}

// Close the connection:


mysqli_close($conn);
  





}
?>

