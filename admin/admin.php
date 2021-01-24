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
<div class="text-right">
<a class="btn btn-primary" href="addadmin.php">Add Admin</a>


</div>
<br>
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>

<th>Edit</th>
<th>Delete</th>


</tr>

<?php
include('db/conn.php');

$page1=$_GET['page'];
if($page1=="" || $page1==1)
{
    $page2=0;
}
else{
    $page2=($page1*3)-3;
}

   
$query=mysqli_query($conn,"select * from admin limit $page2,3 ");
while($row=mysqli_fetch_array($query)){


?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>


<td><a class="btn btn-info btn-sm" href="editadmin.php?editadmin=<?php echo $row['id'];  ?>">edit</a></td>
<td><a  class="btn btn-danger btn-sm" href="deleteadmin.php?deleteadmin=<?php echo $row['id'];  ?>">delete</a></td>
</tr>




<?php }?>
</table>


<ul class="pagination">
<li  <?php if($page1 <= 1){ echo "class='page-item disabled'"; } ?>>
<a href="admin.php?page=<?php echo $page1-1;?>" class="page-link">Previous</a>
</li>

<?php
$sql=mysqli_query($conn,"select * from addmin");

$count=mysqli_num_rows($sql);
$a=$count/3; //total no pages
 $a=ceil($a);
for($i=1; $i<=$a; $i++)

{
?>

<li class="page-item"><a class="page-link" href="admin.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>



<?php } ?>
<li <?php if($page1 >= $a){ echo "class='page-item disabled'"; } ?>>
<a  class="page-link " href="admin.php?page=<?php echo $page1+1;?>">Next</a>
</li>

</ul>

















</div>