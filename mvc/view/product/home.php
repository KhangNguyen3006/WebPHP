<?php 
  $products=$data['products'];
  $paging=$data['paging'];
?>

<div class="container">
  <div class="row">
        <div class="col-md-3">
            <img src="<?php echo BASE_URL; ?>public/img/sale.png" alt="hinhsale" class=img-fluid>
        </div>
        
        <?php foreach ($products as $product ){ ?>
        <div class="col-md-3 col-sm-6 text-center card">
          <div><img src="<?php echo BASE_URL ?>public/upload/<?php echo $product['image'] ?>" class="card-img-top" alt="hình ảnh"></div>
              <div class="alert alert-success">
              <a href="<?php echo BASE_URL.'product/productdetail/'.$product['alias'] ?>" class="text-decoration-none"><?php echo $product['productName'] ?></a><br>
                <p class="card-text"><span class='text-decoration-line-through'><?php echo number_format($product['price'],2) ?>$</span><br><span class='text-danger'><?php echo number_format($product['saleprice'],2) ?>$</span></p>
                <a class="btn btn-primary" href='<?php echo BASE_URL?>cart/add/<?php echo $product['productId']?>/<?php echo $product['productName']?>/<?php if($product['saleprice']<>0) echo $product['saleprice']; else echo $product['price']?>'>Add to cart</a>

              </div>
      </div>
      <?php } ?>
  </div>
  <div class="row">
    <?php $paging->createLinks(); ?>
  </div>
</div>