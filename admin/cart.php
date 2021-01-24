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
<li class="breadcrumb-item active"><a href="cart.php">Cart</a> </li>


</ul>



</div>
<div class="text-right">



</div>
<br>
<table class="table table-bordered">
<tr>
<th>Cart ID</th>
<th>User ID</th>
<th>product ID</th>


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

   
$query=mysqli_query($conn,"select * from cart limit $page2,3 ");
while($row=mysqli_fetch_array($query)){


?>
<tr>
<td><?php echo $row['cart_id']; ?></td>
<td><?php echo $row['user_id']; ?></td>
<td><?php echo $row['id']; ?></td>




</tr>




<?php }?>
</table>


<ul class="pagination">
<li  <?php if($page1 <= 1){ echo "class='page-item disabled'"; } ?>>
<a href="cart.php?page=<?php echo $page1-1;?>" class="page-link">Previous</a>
</li>

<?php
$sql=mysqli_query($conn,"select * from cart");

$count=mysqli_num_rows($sql);
$a=$count/3;
 $a=ceil($a);
for($i=1; $i<=$a; $i++)

{
?>

<li class="page-item"><a class="page-link" href="cart.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>



<?php } ?>
<li <?php if($page1 >= $a){ echo "class='page-item disabled'"; } ?>>
<a  class="page-link " href="cart.php?page=<?php echo $page1+1;?>">Next</a>
</li>

</ul>


















</div>

