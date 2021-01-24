<?php

//require database
require('./database/DBController.php');

//require product

require('./database/AddProduct.php');

//require cart 
require('./database/AddCart.php');

//db controller object
$db=new DBController();

//product object
$product=new AddProduct($db);
$product_shuffle=$product->getData();

//print_r($product->getData());

//cart object
$Cart=new Cart($db);

?>