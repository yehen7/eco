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
$query=mysqli_query($conn,"select * from products where id='$id'");
while($row=mysqli_fetch_array($query))
{
    $id=$row['id'];
    $name=$row['name'];
    $img=$row['img'];
    $des=$row['description'];
    $seller=$row['seller'];
    $price=$row['price'];
    $type=$row['type'];

    
}



?>

<div style="width:70%; margin-left:25%; margin-top:5%">
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item active"><a href="home.php">Home</a> </li>
<li class="breadcrumb-item active"><a href="products.php">Products</a> </li>


</ul>



</div>


<form action="edit.php" method="post" enctype="multipart/form-data" name="productform" onsubmit="return validateform()">
<h3>Update products</h3>

  <div class="form-group">
    <label for="email">Name</label>
    <input type="text" class="form-control" value="<?php echo $name; ?>" name="name" id="email" placeholder="add a name">
  </div>
  <div class="form-group">
    <label for="email">Image:</label>
    <input type="file" class="form-control img-thumbnail"  value="<?php echo $img; ?>"  name=" img" id="email">
    <img class="img img-thumbnail" src="assets/<?php echo $img; ?>" alt="" width="100" heigth="100">
  </div>
  <div class="form-group">
    <label for="email">Description</label>
    <input type="text" class="form-control" value="<?php echo $des; ?>" name="description" id="email" placeholder="add product description">
  </div>
  <div class="form-group">
    <label for="email">Seller</label>
    <input type="text" class="form-control" value="<?php echo $seller; ?>" name="seller" id="email" placeholder="add a seller">
  </div>
  <div class="form-group">
    <label for="email">Price</label>
    <input type="text" class="form-control" value="<?php echo $price; ?>" name="price" id="email" placeholder="add product price">
  </div>
  <div class="form-group">
    <label for="email">Type</label>
    <input type="text" class="form-control" value="<?php echo $type ?>" name="type" id="email" placeholder="add product type">
  </div>

  <input type="hidden" name="id" value="<?php  echo $_GET['edit']; ?>">
  <input type="submit" name="submit" class="btn btn-primary" value="Update"/>
</form>
<script>

function validateform()
{
    var a=document.forms['productform']['name'].value;
    
    var b=document.forms['productform']['description'].value;
    
    var c=document.forms['productform']['price'].value;
    
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
</div>

<?php

include('db/conn.php');


if(isset($_POST['submit'])){
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $des=$_POST['description'];
    $seller=$_POST['seller'];
    $price=$_POST['price'];
    $type=$_POST['type'];
    $img=$_FILES['img']['name'];
    $tmp_img=$_FILES['img']['tmp_name'];
  
    move_uploaded_file($tmp_img,"assets/$img");
    
  $error = null;//initializing the $error
  if (empty($name)) {
  $error = 'You forgot to enter a name';
  }
  
  if (empty($des)) {
  $error = 'You forgot to enter a description!';
  }
  
  if (empty($price)) {
  $error = 'You forgot to enter a price!';
  }
  
  if (empty($type)) {
  $error= 'You forgot to add a  type';
  }
  
  if(!empty($error))//if error occured
  {
     die( $error);//Stops the script and prints the errors if any occured
  }
  // Insert the data from the form into the DB:
  
  $sql = "update products set name='$name',img='$img',description='$des',seller='$seller',price='$price',type='$type' where id='$id'"
  ;
  
  // Enter the info the end user type if everything is ok:

if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($conn));
}
else
{
echo  "<script>alert('products updated sucessfully')</script>";
echo "<script>window.location='http://localhost/eco/admin/products.php';</script>";
}

// Close the connection:


mysqli_close($conn);
  





}
?>

