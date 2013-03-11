<?php
$theauthor = get('theauthor'); 
$permalink = get_permalink();
?>

<div class="featured-essay <?php if (is_search()) {echo 'search';} ?>">
      <h3><?php if (is_search()) {?>Essay: <?php } ?><a href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a></h3>
      <div class="desc">
        <?php if (get('thumbnail')) { ?><div class="thumb"><?php echo get_image('thumbnail'); ?></div><?php } ?>
        <?php echo get('summary'); ?>
        <div class="link">&raquo; <a href="<?php echo $permalink; ?>">Read this essay, by <?php echo $theauthor; ?></a></div>
      </div>
      <?php /* edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' )  */ ?>
      <div class="clear"></div>
</div>
