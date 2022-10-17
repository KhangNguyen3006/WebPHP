<?php 
  $products=$data['products'];
  $paging=$data['paging'];
  $brand=$data['brand'];
?>

<div class="col-md-9">
    <div class="row alert alert-danger text-center fw-bold"><div class="col-md-12"><?php echo $brand['brandName']?></div></div>
    <div class="row">
      <?php foreach($products as $product ){?>
      <div class="col-md-4 col-sm-6 text-center card">
      <div><img src="<?php echo BASE_URL ?>public/upload/<?php echo $product['image'] ?> "  alt="hinh anh" class="img-fluid"></div>  
            <div class="alert alert-success">
              <a href="<?php echo BASE_URL.'product/productdetail/'.$product['alias'] ?>" class="text-decoration-none"><?php echo $product['productName']?></a><br>
                <?php 
                  if($product['saleprice']!='') {?>
                    <span class='text-decoration-line-through'><?php echo number_format($product['price'],2) ?></span><br><span class='text-danger'><?php echo number_format($product['saleprice'],2)?></span>
                  <?php }
                  else {
                    ?>
                    <span class='text-danger'><?php echo number_format($product['price'],2)?></span>
                    <?php }?>

                    <a class="btn btn-primary" href='<?php echo BASE_URL?>cart/add/<?php echo $product['productId']?>/<?php echo $product['productName']?>/<?php if($product['saleprice']<>0) echo $product['saleprice']; else echo $product['price']?>'>Add to cart</a>
            </div>
      </div>
      <?php } ?>
    </div>
      <div class="row"><?php $paging->createLinks();?></div>
</div>