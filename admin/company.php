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
<li class="breadcrumb-item active"><a href="company.php">Recycle Company</a> </li>


</ul>



</div>
<div class="text-right">
<a class="btn btn-primary" href="addcompany.php">Add Company</a>


</div>
<br>
<table class="table table-bordered">
<tr>

<th>Company ID</th>
<th>Company Name</th>
<th>Company Address</th>
<th>Email</th>
<th>Telephone</th>

<th> Recycle Type</th>
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

   
$query=mysqli_query($conn,"select * from company limit $page2,3 ");
while($row=mysqli_fetch_array($query)){


?>
<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['company_name']; ?></td>

<td><?php echo $row['company_address']; ?></td>
<td><?php echo $row['company_email']; ?></td>
<td><?php echo $row['company_tele']; ?></td>
<td><?php echo $row['type']; ?></td>


<td><a class="btn btn-info btn-sm" href="editcompany.php?edit=<?php echo $row['id'];  ?>">edit</a></td>
<td><a  class="btn btn-danger btn-sm" href="deletecompany.php?delete=<?php echo $row['id'];  ?>">delete</a></td>

</tr>




<?php }?>
</table>


<ul class="pagination">
<li  <?php if($page1 <= 1){ echo "class='page-item disabled'"; } ?>>
<a href="company.php?page=<?php echo $page1-1;?>" class="page-link">Previous</a>
</li>

<?php
$sql=mysqli_query($conn,"select * from company");

$count=mysqli_num_rows($sql);
$a=$count/3;
 $a=ceil($a);
for($i=1; $i<=$a; $i++)

{
?>

<li class="page-item"><a class="page-link" href="company.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>



<?php } ?>
<li <?php if($page1 >= $a){ echo "class='page-item disabled'"; } ?>>
<a  class="page-link " href="company.php?page=<?php echo $page1+1;?>">Next</a>
</li>

</ul>


















</div>

