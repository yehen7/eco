<?php

session_start();
error_reporting(0);


if($_SESSION['email']==true)
{

}
else

    header('location:admin_login.php');
    $page='news';
include('header.php');




?>


<div style="width:70%; margin-top:10%; margin-left:20%" >
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item active"><a href="home.php">Home</a> </li>
<li class="breadcrumb-item active"><a href="company.php">Collectors</a> </li>


</ul>



</div>
<div class="text-right">
<a class="btn btn-primary" href="addcollector.php">Add Collectors</a>


</div>
<br>
<table class="table table-bordered">
<tr>

<th>Collector ID</th>
<th>Collector Name</th>
<th>Collector NIC</th>
<th>Vehicle Type</th>
<th>Mobile Number</th>
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
    $page2=($page1*3)-1;
}

   
$query=mysqli_query($conn,"select * from collector limit $page2,3 ");
while($row=mysqli_fetch_array($query)){


?>
<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['collector_name']; ?></td>

<td><?php echo $row['collector_nic']; ?></td>
<td><?php echo $row['vehicle_type']; ?></td>
<td><?php echo $row['mobile_no']; ?></td>
<td><?php echo $row['email']; ?></td>


<td><a class="btn btn-info btn-sm" href="editcollector.php?edit=<?php echo $row['id'];  ?>">edit</a></td>
<td><a  class="btn btn-danger btn-sm" href="deletecollector.php?delete=<?php echo $row['id'];  ?>">delete</a></td>

</tr>




<?php }?>
</table>


<ul class="pagination">
<li  <?php if($page1 <= 1){ echo "class='page-item disabled'"; } ?>>
<a href="collectors.php?page=<?php echo $page1-1;?>" class="page-link">Previous</a>
</li>

<?php
$sql=mysqli_query($conn,"select * from collector");

$count=mysqli_num_rows($sql);
$a=$count/3;
 $a=ceil($a);
for($i=1; $i<=$a; $i++)

{
?>

<li class="page-item"><a class="page-link" href="collectors.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>



<?php } ?>
<li <?php if($page1 >= $a){ echo "class='page-item disabled'"; } ?>>
<a  class="page-link " href="collectors.php?page=<?php echo $page1+1;?>">Next</a>
</li>

</ul>


















</div>

