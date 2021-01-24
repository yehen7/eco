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
$query=mysqli_query($conn,"select * from company where id='$id'");
while($row=mysqli_fetch_array($query))
{
    $id=$row['id'];
   
  $name=$row['company_name'];
  $address=$_POST['company_address'];
  
  $email=$row['company_email'];
  $tele=$row['company_tele'];
  $type=$row['type'];
    
}



?>

<div style="width:70%; margin-left:25%; margin-top:5%">
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item active"><a href="home.php">Home</a> </li>
<li class="breadcrumb-item active"><a href="company.php">Recycle Company</a> </li>


</ul>



</div>


<form action="editcompany.php" method="post" enctype="multipart/form-data" name="productform" onsubmit="return validateform()">
<h3>Update Company</h3>

  <div class="form-group">
  <label for="email">Company Name</label>
    <input type="text" class="form-control" value="<?php echo $name; ?>" name="name" id="email" placeholder="add a company name">
  </div>
 
  <div class="form-group">

  <label for="email">Company Address</label>
    <input type="text" class="form-control" value="<?php echo $address; ?>" name="address" id="email" placeholder="add company address">
  </div>
  <div class="form-group">
  <label for="email">Company Email</label>
    <input type="text" class="form-control" value="<?php echo $email; ?>" name="email" id="email" placeholder="add company email">
  </div>
  <div class="form-group">
  <label for="email">Company Tele</label>
    <input type="text" class="form-control" value="<?php echo $tele; ?>" name="tele" id="email" placeholder="add company telephone number">
  </div>
  <div class="form-group">
  <label for="email">Recycle Type</label>
    <input type="text" class="form-control" value="<?php echo $type ?>" name="type" id="email" placeholder="add recycle Type">
  </div>

  <input type="hidden" name="id" value="<?php  echo $_GET['edit']; ?>">
  <input type="submit" name="submit" class="btn btn-primary" value="Update"/>
</form>
<script>

function validateform()
{
    var a=document.forms['productform']['name'].value;
    
    var b=document.forms['productform']['address'].value;
    
    var c=document.forms['productform']['email'].value;
    
    var d=document.forms['productform']['tele'].value;

if(a=="")
{
    alert('company name must be filled out !');
    return false;
}

if(b=="")
{
    alert('address  must be filled out !');
    return false;
}



}


</script>
</div>

<?php

include('db/conn.php');


if(isset($_POST['submit'])){
    
    $name=$_POST['name'];
    $address=$_POST['address'];
    
    $email=$_POST['email'];
    $tele=$_POST['tele'];
    $type=$_POST['type'];
    
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
  
  $sql = "update company set company_name='$name',company_address='$address',company_email='$email',company_tele='$tele',type='$type' where id='$id'"
  ;
  
  // Enter the info the end user type if everything is ok:

if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}
else
{
echo  "<script>alert('Company updated sucessfully')</script>";
echo "<script>window.location='http://localhost/eco/admin/company.php';</script>";
}

// Close the connection:


mysqli_close($conn);
  





}
?>

