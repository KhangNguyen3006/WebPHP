<?php require_once PATH_TO_MODUL.'header.php'; ?>
<?php require_once PATH_TO_MODUL.'slide.php'; ?>


  <div class="container mt-4">

      <div class="row">
        <div class="col-md-3">        
          <?php require_once PATH_TO_MODUL.'leftcategorymenu.php'; ?>
          <?php require_once PATH_TO_MODUL.'leftbrandmenu.php'; ?>
          <?php require_once PATH_TO_MODUL.'leftmapmenu.php'; ?>
        </div>

        <div class="col-md-9">
         <?php include_once PATH_TO_VIEW.$viewname.'.php'; ?>
        </div>
        
      </div>
    </div>
    
    <footer class="container-fluid  bg-dark">
      <?php require_once PATH_TO_MODUL.'bottommenu1.php'; ?>
      <?php require_once PATH_TO_MODUL.'bottommenu2.php'; ?>


        <div class="col-md-3 p-4">
          <a style="text-decoration: none" class="fab fa-facebook text-white-50 p-2 " href="https://www.facebook.com/profile.php?id=100010351143601" ></a>
          <a style="text-decoration: none" class="fab fa-instagram text-white-50 p-2 " href="https://www.instagram.com/"></a>
          <a style="text-decoration: none" class="fab fa-twitter text-white-50 p-2 " href="https://twitter.com/?lang=vi"></a>
          <a style="text-decoration: none" class="fab fa-google text-white-50 p-2" href="http://nguyenthanhkhang/WEBSITE_HL/NguyenThanhKhang_2119110013/"></a>
        </div>
    </footer>

    <!-- Modal -->
    <?php require_once PATH_TO_MODUL.'cart.php'; ?>

</body>
</html>
