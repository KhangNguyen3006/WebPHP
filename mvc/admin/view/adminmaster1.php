<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Technology Store</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css" >
  <script src="<?php echo BASE_URL; ?>public/js/popper.min.js"></script>
  <script src="<?php echo BASE_URL; ?>public/js/bootstrap.min.js" ></script>

  <script src="https://kit.fontawesome.com/fb3aa5052d.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="container bg-light">
    <div class="row">
        <div class="col-md-4"><img src="<?php echo BASE_URL; ?>public/img/logo.jfif" alt="brand"></div>
        <div class="col-md-4"></div>
          <div class="col-md-4">
              <?php if(isset($_SESSION['username']))echo "Xin Chào ".  $_SESSION['username'] ?>
              <button class='btn-primary'><a class='btn-primary' href='<?php echo BASE_URL?>auth/adminLogout'>Đăng xuất</a></button>
          </div>
    </div>

</header>
<div class="container">
    <div class="row">
        <div class="col-md-3">
			    <div class="card">
                <h5 class="card-header">DASHBOARD</h5>

       

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                              Quản lý sản phẩm
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-info" href="<?php echo BASE_URL ?>adminproduct/addproduct/">Thêm sản phẩm</a>
                            <a class="nav-link btn btn-info" href="<?php echo BASE_URL?>adminproduct/productlist/<?php echo LIMIT.'/0'?>">Xem danh sách sản phẩm</a>
                            <a class="nav-link btn btn-info" href="<?php echo BASE_URL?>adminproduct/productListInTrash/<?php echo LIMIT.'/0'?>">Xem thùng rác</a>
                            </div>
                          </div>
                       </div> 
                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="false" aria-controls="collapseTwo">
                              Quản lý nhóm sản phẩm
                            </button>
                          </h2>
                          <div id="collapsetwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-info" href="<?php echo BASE_URL ?>admincategory/addcat/">Thêm nhóm sản phẩm</a>
                            <a class="nav-link btn btn-info" href="<?php echo BASE_URL ?>admincategory/catlist/<?php echo LIMIT.'/0'?>">Xem danh sách nhóm sản phẩm</a>
                            <a class="nav-link btn btn-info" href="<?php echo BASE_URL ?>admincategory/catlistintrash/<?php echo LIMIT.'/0'?>">Xem thùng rác</a>
                            </div>
                          </div>
                       </div>                      
                  </div>

              </div>
           
       
        </div>
  <div class='col-md-9'>
      <?php require_once PATH_TO_ADMINVIEW.$view.'.php'?>
    </div>
    
   <footer class="container-fluid row bg-dark">
   @copyright 2020
    </footer>



</body>
</html>