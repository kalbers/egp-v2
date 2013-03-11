
<div class="widget">
  <h3 class="widget-title image-gallery">Image Gallery</h3>
  <div class="imagethumbs">
    <?php

      foreach($att_images as $image) {

          $attachment=wp_get_attachment_image_src($image->ID, 'thumbnail');
          $attributes='';
      ?>
    <p class="imagelink"><a title="<?php echo $image->post_title; ?>" class="<?php echo $image->ID; ?>" href="#<?php echo $image->ID; ?>" rel="#img_gallery"><img src="<?php echo $attachment[0]; ?>" <?php echo $attributes; ?> /></a></p>
    <?php } ?>
    <div class="clear"></div>
  </div>
  <div class="overlay" id="img_gallery">
    <div class="slidetabs">
      <?php for ($i = 0; $i <= count($att_images)-1; $i++) { ?>
      <a title="<?php echo $att_images[$i]->post_title; ?>" id="<?php echo $att_images[$i]->ID; ?>" href="#<?php echo $att_images[$i]->ID; ?>"></a>
      <?php } ?>
    </div>
    <div class="slides">
      <?php 
      	  foreach($att_images as $image) {
      	    $attachment = wp_get_attachment_image_src($image->ID, 'large');
      	    $attributes='';
      	   ?>
      <div class="slide">
        <p class="asset"><img src="<?php echo $attachment[0]; ?>" <?php echo $attributes; ?> /></p>
        <div class="slidenav"> <a class="prev">prev</a> <a class="next">next</a> </div>
        <div class="imagecaption">
          <h4><strong><?php echo $image->post_title; ?></strong></h4>
          <p class=""><?php echo $image->post_content; ?></p>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>