<!-- Special Price -->
<?php
    $brand = array_map(function ($pro){ return $pro['type']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['product_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));

?>





<section id="products">
        <div class="container">
          <h4 class="font-rubik font-size-20">Products</h4>
          <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Products</button>
            
            <?php
                array_map(function ($brand){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
            ?>
       
           
          </div>

          <div class="grid">
            <?php array_map(function($item)use($in_cart){?>
            <div class="grid-item  border<?php echo $item['type'] ?? "type";?>">
             <div class="item py-2" style="width: 200px;">
              <div class="product font-rale">
                <a href="<?php printf('%s?id=%s','detail.php',$item['id']) ?>"><img src="assets/<?php echo $item['img']; ?>" alt="product1" class="img-fluid"></a>
                <div class="text-center">
                  <h6><?php echo $item['name'] ?? "unknown";?></h6>
                  <div class="rating text-warning font-size-12">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                  </div>
                  <div class="price py-2">
                    <span>RS<?php echo $item['price'] ?? "0" ;?></span>
                  </div>
                  <form method="POST">
                          <input type="hidden" name="id" value="<?php echo $item['id']  ?>">
                          <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                          <?php
                                if (in_array($item['id'], $in_cart ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="product_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                         
                        </form>
                </div>
              </div>
            </div>
            </div>
            <?php }, $product_shuffle) ?>
          </div>
        </div>
      </section>
      
    </main>
    <!--end main-->

    
      <br>
      <br>