<?php 
  $linkmodel=new LinkModel;
  $links=$linkmodel->getAll(['trash'=>0, 'status'=>1, 'position'=>'bottommenu1']);
?>

<div class="row">
  <div class="col-md-7 p-5">
      <?php foreach($links as $link){?>
          <a href="<?php echo BASE_URL.$link['link'] ?>" class=text-decoration-none><?php echo $link['title'] ?></a><br>
      <?php }?>
</div>