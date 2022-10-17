<?php 
  $imagemodel=new ImageModel;
  $images=$imagemodel->getAll(['trash'=>0, 'status'=>1, 'position'=>1]);
?>



<div class="container-fluid">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
          </div>


          <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo BASE_URL.'public/img/'.$images[0]['image'] ?>" class="d-block w-100" alt="slide01">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                  <?php unset($images[0]) ?>
                <?php foreach ($images as $image){ ?>
                  <div class="carousel-item">
                    <img src="<?php echo BASE_URL.'public/img/'.$image['image']?>" class="d-block w-100" alt="slide01">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                  <?php } ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>