<?php 

include('db/conn.php');

$id=$_GET['delete'];

$query=mysqli_query($conn,"delete  from collector where id='$id'");
if($query){

    echo "<script>alert('collector deleted sucessfully')</script>";
    echo "<script>window.location='http://localhost/eco/admin/collectors.php';</script>";
  }
  else{
    echo "<script>alert('please try again!!')</script>";
  }
?>