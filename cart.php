<?php
ob_start();
include('./header.php');

?>
<?php
  count($product->getData('cart')) ? include ('./_cart-detail.php') :  include ('./_cart-not-found.php');

?>
<?php

include('./footer.php');
?>