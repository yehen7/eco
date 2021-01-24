<?php 

include('db/conn.php');

$id=$_GET['delete'];

$query=mysqli_query($conn,"delete  from products where id='$id'");
if($query){

    echo "<script>alert('product deleted sucessfully')</script>";
    echo "<script>window.location='http://localhost/eco/admin/products.php';</script>";
  }
  else{
    echo "<script>alert('please try again!!')</script>";
  }
?>