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
$cats =$data['cats'];
$paging =$data['paging'];
?>
<a class="btn btn-primary" href="#" role="button">Link</a>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">CatId</th>
      <th scope="col">CatName</th>
      <th scope="col">Status</th>
      <th scope="col">ParentId</th>
      <th scope="col">Trash</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach ($cats as $p) { 
    ?>
    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><?php echo $p['catId'] ?></td>
      <td><?php echo $p['catName'] ?></td>
      <td><a href='<?php echo BASE_URL ?>admincategory/catToggleStatus/<?php echo $p['catId']?>'><?php if ($p['status']==1) echo '<i class="fas fa-check text-primary"></i>'; else echo '<i class="fas fa-times text-danger"></i>' ?></a></td>
      <td><?php echo $p['parentId'] ?></td>
      <td><?php echo $p['trash'] ?></td>
      <td><a href='<?php echo BASE_URL ?>admincategory/catToggleTrash/<?php echo $p['catId'] ?>'onclick='return confirm("Bạn có chắc chắn xóa sản phẩm này?") ;'>Xóa</a>|
      <a href='<?php echo BASE_URL ?>admincategory/updatecat/<?php echo $p['catId'] ?>'> Sửa </a> </td>
    </tr>
     <?php } ?>
  </tbody>
</table>
<?php  $paging->createLinks(); ?>