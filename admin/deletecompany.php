<?php 

include('db/conn.php');

$id=$_GET['delete'];

$query=mysqli_query($conn,"delete  from company where id='$id'");
if($query){

    echo "<script>alert('company deleted sucessfully')</script>";
    echo "<script>window.location='http://localhost/eco/admin/company.php';</script>";
  }
  else{
    echo "<script>alert('please try again!!')</script>";
  }
?>