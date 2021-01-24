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
<li class="breadcrumb-item active"><a href="products.php">Products</a> </li>


</ul>



</div>
<div class="text-right">
<a class="btn btn-primary" href="addproduct.php">Add Products</a>


</div>
<br>
<div class="table-responsive">
<table class="table align-items-center table-flush">
<tr>

<th>Product ID</th>
<th>Name</th>
<th>Img</th>
<th>Description</th>
<th>Seller</th>
<th>Price</th>
<th>Type</th>
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

   
$query=mysqli_query($conn,"select * from products limit $page2,3 ");
while($row=mysqli_fetch_array($query)){


?>
<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td> <img  class="img img-thumbnail" width="150" height="100" src="../assets/<?php echo $row['img']; ?> "  alt=""></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['seller']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['type']; ?></td>


<td><a class="btn btn-info btn-sm" href="edit.php?edit=<?php echo $row['id'];  ?>">edit</a></td>
<td><a  class="btn btn-danger btn-sm" href="delete.php?delete=<?php echo $row['id'];  ?>">delete</a></td>

</tr>




<?php }?>
</table>

</div>
<ul class="pagination">
<li  <?php if($page1 <= 1){ echo "class='page-item disabled'"; } ?>>
<a href="products.php?page=<?php echo $page1-1;?>" class="page-link">Previous</a>
</li>

<?php
$sql=mysqli_query($conn,"select * from products");

$count=mysqli_num_rows($sql);
$a=$count/3;
 $a=ceil($a);
for($i=1; $i<=$a; $i++)

{
?>

<li class="page-item"><a class="page-link" href="products.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>



<?php } ?>
<li <?php if($page1 >= $a){ echo "class='page-item disabled'"; } ?>>
<a  class="page-link " href="products.php?page=<?php echo $page1+1;?>">Next</a>
</li>

</ul>


















</div>

