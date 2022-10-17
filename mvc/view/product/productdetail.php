<?php
  $currentproduct=$data['currentproduct'];
  $sameProducts=$data['sameProducts'];
?>


<div class="col-md-9">
<div class="row" >
    <div class="alert alert-primary" role="alert">Chi tiết sản phẩm</div>
</div>
            <div class="card mb-3" style="max: width 800px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="<?php echo BASE_URL ?>public/upload/<?php echo $currentproduct['image'] ?>" class="img-fluid" alt="hinhanh">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title alert alert-danger"><?php echo $currentproduct['productName'] ?></h5>
                    <p class="card-text"><?php echo $currentproduct['detail'] ?></p>
                    <p class="card-text">
                    <?php 
                      if($currentproduct['saleprice']!='') {?>
                  <span class='text-decoration-line-through'><?php echo number_format($currentproduct['price'],2) ?>$</span><br><span class='text-danger'><?php echo number_format($currentproduct['saleprice'],2)?>$</span>
                     <?php }
                     else {
                     ?>
                  <span class='text-danger'><?php echo number_format($currentproduct['price'],2)?>$</span>
                     <?php }?>
                     </p>
                      
                     <a class="btn btn-primary" href='<?php echo BASE_URL?>cart/add/<?php echo $currentproduct['productId']?>/<?php echo $currentproduct['productName']?>/<?php if($currentproduct['saleprice']<>0) echo $currentproduct['saleprice']; else echo $currentproduct['price']?>'>Add to cart</a>
                  </div>
                </div>
              </div>
            </div>
       
          <div class="row">
              <div class="alert alert-success" role="alert">Sản phẩm cùng loại</div>
              <?php foreach ($sameProducts as $sameProduct) {?>
        <div class="col-md-6 col-sm-6 text-center card">
                   <div> <img src="<?php echo BASE_URL ;?>public/upload/<?php echo $sameProduct['image'] ;?> "  alt="hinhanh" class="img-fluid"></div>
                    <div class="alert alert-success">
                      <p> <a href="<?php echo BASE_URL.'product/productDetail/'.$sameProduct['alias'] ?>" class="text-decoration-none"><?php echo $sameProduct['productName']?></a></p>
                      <?php 
                      if($sameProduct['saleprice']!='') {?>
                      <span class="text-decoration-line-through"><?php echo number_format($sameProduct['price']) ?>$</span>&nbsp;<br><span class="text-danger"><?php echo number_format($sameProduct['saleprice']) ?>$</span></a></p>
                     <?php }
                     else {
                     ?>
                        <span class=" text-danger"><?php echo number_format($sameProduct['price']) ?>$</span>
                     <?php }?>
                     <a class="btn btn-primary" href='<?php echo BASE_URL?>cart/add/<?php echo $currentproduct['productId']?>/<?php echo $currentproduct['productName']?>/<?php if($currentproduct['saleprice']<>0) echo $currentproduct['saleprice']; else echo $currentproduct['price']?>'>Add to cart</a>
                    </div>     
                       
                  </div>
        <?php }?>
        </div>
                </div>