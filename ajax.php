<?php


//require database
require('./database/DBController.php');

//require product

require('./database/AddProduct.php');


//db controller object
$db=new DBController();

//product object
$product=new AddProduct($db);

if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}

?>