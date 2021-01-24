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
<li class="breadcrumb-item active"><a href="products.php">Products</a> </li>


</ul>



</div>


<form action="addproduct.php" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="productform" onsubmit="return validateform()">
<h3>Add products</h3>

  <div class="form-group">
    <label for="email">Name</label>
    <input type="text" class="form-control" name=" name" id="email" placeholder="add product name">
  </div>
  <div class="form-group">
    <label for="email">Image</label>
    <input type="file" class="form-control img-thumbnail" name="img" id="email" placeholder="add product image">
  </div>
  <div class="form-group">
    <label for="email">Description</label>
    <input type="text" class="form-control" name="description" id="email" placeholder="add a description">
  </div>
  <div class="form-group">
    <label for="email">Seller</label>
    <input type="text" class="form-control" name="seller" id="email" placeholder="add seller name">
  </div>
  <div class="form-group">
    <label for="email">Price</label>
    <input type="text" class="form-control" name="price" id="email" placeholder="add price">
  </div>
  <div class="form-group">
    <label for="email">Type</label>
    <input type="text" class="form-control" name="type" id="email" placeholder="add Type">
  </div>
  
  <input type="submit" name="submit" class="btn btn-primary" value="Add products"/>
</form>
<script>

function validateform()
{
    var a=document.forms['productform']['name'].value;
    
    var b=document.forms['productform']['description'].value;
    
    
    
    var d=document.forms['productform']['img'].value;

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

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $des=$_POST['description'];
  
  $seller=$_POST['seller'];
  $price=$_POST['price'];
  $type=$_POST['type'];
  $img=$_FILES['img']['name'];
  $tmp_img=$_FILES['img']['tmp_name'];

  move_uploaded_file($tmp_img,"../assets/$img");

  $error = null;//initializing the $error
if (empty($name)) {
$error = 'You forgot to enter a title!';
}

if (empty($des)) {
$error = 'You forgot to enter a news!';
}

if (empty($price)) {
$error = 'You forgot to enter a date!';
}

if (empty($img)) {
$error= 'You forgot to add a  thumbnail';
}

if(!empty($error))//if error occured
{
   die( $error);//Stops the script and prints the errors if any occured
}
// Insert the data from the form into the DB:

$sql = "INSERT INTO products (name,img,description,seller,price,type)
VALUES
('$name','$img','$des','$seller','$price','$type')";

// Enter the info the end user type if everything is ok:

if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}
else
{
echo  "<script>alert('products added sucessfully')</script>";
}

// Close the connection:


mysqli_close($conn);
  




}




?>

