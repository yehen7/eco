<?php
    $id = $_GET['id'] ;
    foreach ($product->getData() as $item) :
        if ($item['id']== $id) :

            shuffle($product_shuffle);

  
    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      if (isset($_POST['top_sale_submit'])){
          // call method addToCart
          $Cart->addToCart($_POST['user_id'], $_POST['id']);
      }
  }
?>





<section id="product" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="assets/<?php echo $item['img'] ?>" alt="product" class="img-fluid">
                    <div class="form-row pt-4 font-size-16 font-baloo">
                        <div class="col">
                        <form method="POST">
                          <input type="hidden" name="id" value="<?php echo $item['id']  ?>">
                          <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                          
                          <?php
                            if (in_array($item['id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            }else{
                             
                            }
                            ?>
                        </form>
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-6 py-5">
                    <h5 class="font-baloo font-size-20"><?php echo $item['name'] ?></h5>
                    
                    <div class="d-flex">
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                          </div>
                          <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                    </div>
                    <hr class="m-0">

                    <!---    product price       -->
                        <table class="my-3">
                            
                            <tr class="font-rale font-size-14">
                                <td> Price:</td>
                                <td class="font-size-20 text-danger">RS<span><?php echo $item['price'] ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                            </tr>
                            
                        </table>
                    <!---    !product price       -->

                     <!--    #policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">Eco-cycle<br>Deliverd</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">3 months <br>Warranty</a>
                                </div>
                            </div>
                        </div>
                      <!--    !policy -->
                        <hr>

                    <!-- order-details -->
                        <div id="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Delivery by : Agust 28  - oct 1</small>
                            <small>Sold by <a href="#">Eco-cycle </a>(4.5 out of 5 | 18,198 ratings)</small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                        </div>
                     <!-- !order-details -->

                     <div class="row">
                         <div class="col-6">
                              
                         </div>
                         <div class="col-6">
                           <!-- product qty section -->  
                             
                            <!-- !product qty section -->  
                         </div>
                     </div>

                    <!-- !size -->


                </div>

                <div class="col-12">
                    <h6 class="font-rubik">Product Description</h6>
                    <hr>
                    <p class="font-rale font-size-14"><?php  echo $item['description'];?></p>
                   
                </div>
            </div>
        </div>
    </section>

    <?php 

endif;
    endforeach;
    ?>
