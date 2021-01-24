<?php

session_start();

if($_SESSION['email']==true)
{

}
else

header('location:admin_login.php');
$page='admin';
include('header.php');

?>

<?php 
include('db/conn.php');

$id=$_GET['editadmin'];
$query=mysqli_query($conn,"select * from admin where id='$id'");
while($row=mysqli_fetch_array($query))
{
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $password=$row['password'];
    
}



?>

<div style="width:70%; margin-left:25%; margin-top:5%">
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item active"><a href="home.php">Home</a> </li>
<li class="breadcrumb-item active"><a href="admin.php">Admin Panel</a> </li>


</ul>



</div>


<form action="editadmin.php" method="post"  name="adminform" onsubmit="return validateform()">
<h3>Update Admin</h3>

  <div class="form-group">
    <label for="email">Name</label>
    <input type="text" class="form-control" value="<?php echo $name; ?>" name=" name" id="email" placeholder="add a name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" value="<?php echo $email; ?>" name="email" id="email" placeholder="add a email">
  </div>
  <div class="form-group">
    <label for="email">Password</label>
    <input type="password" class="form-control" value="<?php echo $password; ?>" name="password" id="email" placeholder="add a password">
  </div>
  
  
  <input type="hidden" name="id" value="<?php  echo $_GET['editadmin']; ?>">
  <input type="submit" name="submit" class="btn btn-primary" value="Update"/>
</form>
<script>
function validateform()
{
    var a=document.forms['adminform']['name'].value;
    
    
    
    var c=document.forms['adminform']['password'].value;
    
    

if(a=="")
{
    alert('name must be filled out !');
    return false;
}




}


</script>
</div>

<?php

include('db/conn.php');


if(isset($_POST['submit'])){
    
    $id=$_POST['id'];
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
  
  $sql = "update admin set name='$name',email='$email',password=$password where id='$id'"
  ;
  
  // Enter the info the end user type if everything is ok:

if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}
else
{
echo  "<script>alert(' updated sucessfully')</script>";
echo "<script>window.location='http://localhost/eco/admin/admin.php';</script>";
}

// Close the connection:


mysqli_close($conn);
  





}
?>

