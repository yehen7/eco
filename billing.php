<?php 
ob_start();
//include header
include('./header.php');
require "./database/email.php";

shuffle($product_shuffle);

  


?>




<div class="container py-5">

  <!-- For demo purpose -->
  <div class="row mb-4">
    <div class="col-lg-8 mx-auto text-center">
      <h1 class="display-4">Billing</h1>
      
    </div>
  </div>
  <!-- End -->


  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <!-- Credit card form tabs -->
        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                <i class="fa fa-credit-card"></i>
                                Credit Card
                            </a>
          </li>
         
        </ul>
        <!-- End -->


        <!-- Credit card form content -->
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <p class="alert alert-success">Some text success or error</p>
            <form role="form" action="billing.php" method="POST">
            <?php
            
                    foreach ($product->getData('cart') as $item) :
                        shuffle($product_shuffle);
                        $cart = $product->getProduct($item['id']);
                   
                        $subTotal[] = array_map(function ($item){
                ?>
              <div class="form-group">
                <label for="username">Product Name</label>
                <?php echo $item['name']; ?>
              </div>
              <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $item['id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control ">
                </div>
               
                <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control">
                </div>
                <?php
          return $item['price'];
        }, $cart); // closing array_map function
          
                        endforeach;
          
          ?>
          
          <div class="form-group">
                     <label for="price">Price:</label>
                     <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">RS<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                 </div>
                 
               
              <div class="form-group">
                <label for="cardNumber">Card number</label>
                <div class="input-group">
                  <input type="text" name="cardnumber" placeholder="Your card number" class="form-control" required>
                  <div class="input-group-append">
                    <span class="input-group-text text-muted">
                                                <i class="fa fa-cc-visa mx-1"></i>
                                                <i class="fa fa-cc-amex mx-1"></i>
                                                <i class="fa fa-cc-mastercard mx-1"></i>
                                            </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label><span class="hidden-xs">Expiration</span></label>
                    <div class="input-group">
                      <input type="number" placeholder="MM" name="expireM" class="form-control" required>
                      <input type="number" placeholder="YY" name="expireY" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group mb-4">
                    <label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                                                <i class="fa fa-question-circle"></i>
                                            </label>
                    <input type="text" name="cvv" required class="form-control">
                  </div>
                </div>



              </div>
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Confirm order</button>
            </form>
          </div>
          <!-- End -->

         

      </div>
    </div>
  </div>
</div>

<?php 
//include footer

include('./footer.php');

if(isset($_POST['submit'])){

 
   include('./database/conn.php');
   
     $email=$_POST['email'];
     $address=$_POST['address'];
    $expireY=$_POST['expireY'];
    $expireM=$_POST['expireM'];
     $id=$item['id'];
     $cvv=$_POST['cvv'];
     $total=$Cart->getSum($subTotal) ;
     $type=$item['type'];
     $cardnumber=$_POST['cardnumber'];
     
     sendEmail($email,$total,$cardnumber,$cvv);
   
     
     
     
   
   
     
   
   
     
   
     $error = null;//initializing the $error
   if (empty($address)) {
   $error = 'You forgot to enter a address!';
   }
   
   if(empty($cardnumber))
   {
       $error='You forget to enter your card number';
   }
   if(empty($cvv))
   {
       $error='You forget to enter your card cvv';
   }
   
 
   
   if (empty($email)) {
   $error= 'You forgot to add a  email';
   }
   
   
     
   if(!empty($error))//if error occured
   {
      die( $error);//Stops the script and prints the errors if any occured
   }
   // Insert the data from the form into the DB:
   
   $sql = "INSERT INTO orders (id,type,email,address,total,card,expireM,expireY,cvv)
   VALUES
   ('$id','  $type','$email','$address','$total',' $cardnumber','$expireM','$expireY','$cvv')";
   
   // Enter the info the end user type if everything is ok:
   
   if (!mysqli_query($conn,$sql))
   {
   die('Error: ' . mysqli_error($conn));
   }
  else{
    $query=mysqli_query($conn,"delete  from cart where id='$id'");
    if($query){
    
       
        echo "<script>window.location='http://localhost/eco/thank.php';</script>";//go back to news page
      }
      else{
  
      }
  }
   
   // Close the connection:
   
   
   mysqli_close($conn);
     
   
   
   
   
   }
?>