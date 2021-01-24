<?php 


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedrecord = $Cart->deleteCart($_POST['id']);
    }
}

?>




 <!--Cart section-->
 <div id="cart" class="py-3">
          <div class="container-fluid w-75">
              <h5 class="font-baloo font-size-20">Shopping Cart</h5>
              <div class="row">
                  <div class="col-sm-9">
                  <?php
                    foreach ($product->getData('cart') as $item) :
                        $cart = $product->getProduct($item['id']);
                        $subTotal[] = array_map(function ($item){
                ?>
                      <div class="row border-top py-3 mt-3">
                          <div class="col-sm-2">
                              <img src="assets/<?php echo $item['img'] ?>" alt="cart1" class="img-fluid" style="height: 120px;">
                          </div>
                          <div class="col-sm-8">
                              <h5 class="font-baloo font-size-14"><?php echo $item['name']; ?></h5>
                              <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                  </div>
                                  <a href="#" class="px-2 font-rale font-size-14 ">20 000 ratings</a>
                              </div>
                              <div class="qty d-flex pt-2">
                              <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $item['id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                              <form method="POST">
                              <input type="hidden" value="<?php echo $item['id']  ?>" name="id">
                              <button type="submit"name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                              </form>
                             
                              <button type="submit" class="btn font-baloo text-danger">Save for Later</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="font-size-20 text-danger font-baloo">
                      Rs<span data-id="<?php echo $item['id'] ?? '0'; ?>" class="product_price"><?php echo $item['price'] ?></span>
                  </div>
                  </div>
              </div>

          </div>
          <?php
          return $item['price'];
        }, $cart); // closing array_map function
          
                        endforeach;
          
          ?>
 </div>
          <div class="col-sm-3">
            <div class="sub-total border text-center mt-2">
                <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                <div class="border-top py-4">
                <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">RS<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                        <button type="submit" class="btn btn-warning mt-3"><a href="end.php">Proceed to Buy</a></button>
                </div>
            </div>
        </div>
        </div>
                    