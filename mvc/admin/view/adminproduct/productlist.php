<div class='row button btn-warning'>
  <?php
    if(!empty($_SESSION['msg']))
    {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
  ?>
</div>

<?php 
$products =$data['products'];
$paging =$data['paging'];
?>
<a class="btn btn-primary" href="#" role="button">Link</a>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">ProductId</th>
      <th scope="col">ProductName</th>
      <th scope="col">Status</th>
      <th scope="col">Price</th>
      <th scope="col">Trash</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach ($products as $p) { 
    ?>
    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><?php echo $p['productId'] ?></td>
      <td><?php echo $p['productName'] ?></td>
      <td><a href='<?php echo BASE_URL ?>adminproduct/productToggleStatus/<?php echo $p['productId']?>'><?php if ($p['status']==1) echo '<i class="fas fa-check text-primary"></i>'; else echo '<i class="fas fa-times text-danger"></i>' ?></a></td>
      <td><?php echo $p['price'] ?></td>
      <td><?php echo $p['trash'] ?></td>
      <td><a href='<?php echo BASE_URL ?>adminproduct/productToggleTrash/<?php echo $p['productId'] ?>'onclick='return confirm("Bạn có chắc chắn xóa sản phẩm này?") ;'>Xóa</a>|
      <a href='<?php echo BASE_URL ?>adminproduct/updateProduct/<?php echo $p['productId'] ?>'> Sửa </a> </td>
    </tr>
     <?php } ?>
  </tbody>
</table>
<?php  $paging->createLinks(); ?>