<?php
$products=$data['products'];
$paging=$data['paging'];
$totalRecords=$data['totalRecords'];
?>
  <div class="row">
  <?php echo "Tổng số sản phẩm tìm thấy: " . $totalRecords . " Sản phẩm. " ?>
  </div>
      <div class="row">
      <?php foreach ($products as $product) {?>
        <div class="col-md-6 col-sm-6 text-center card">
                   <div> <img src="<?php echo BASE_URL ;?>public/upload/<?php echo $product['image'] ?> "  alt="hinh01" class="img-fluid"></div>
                    <div class="alert alert-success">
                      <p> <a href="<?php echo BASE_URL.'product/productDetail/'.$product['alias'] ?>" class="text-decoration-none"><?php echo $product['productName']?></a></p>
                      <?php 
                      if($product['saleprice']!='') {?>
                      <span class="text-decoration-line-through"><?php echo number_format($product['price']) ?>$</span>&nbsp;<span class="text-danger"><?php echo number_format($product['saleprice']) ?>$</span></a></p>
                     <?php }
                     else {
                     ?>
                        <span class="text-danger"><?php echo number_format($product['price']) ?>$</span>
                     <?php }?>
                     <a class="btn btn-primary" href='<?php echo BASE_URL?>cart/add/<?php echo $product['productId']?>/<?php echo $product['productName']?>/<?php if($product['saleprice']<>0) echo $product['saleprice']; else echo $product['price']?>'>Add to cart</a>
                    </div>     
                       
                  </div>
        <?php }?>
        </div>
        <div class=row>
        <?php $paging->createLinks(); ?>
        </div>
        </div>