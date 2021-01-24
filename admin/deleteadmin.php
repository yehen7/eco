<?php 

include('db/conn.php');

$id=$_GET['deleteadmin'];

$query=mysqli_query($conn,"delete  from admin where id='$id'");
if($query){

    echo "<script>alert('Admin deleted sucessfully')</script>";
    echo "<script>window.location='http://localhost/eco/admin/admin.php';</script>";
  }
  else{
    echo "<script>alert('please try again!!')</script>";
  }
?>