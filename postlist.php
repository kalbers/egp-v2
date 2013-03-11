<div class="post-list">
<?php //EXCLUDE ESSAYSg
if (!$my_query) {
  $my_query = new WP_Query($query_string);
}
?>
<?php while ( $my_query->have_posts() ) : $my_query->the_post();

//SEARCH RESULTS & ESSAY
if ((cat_is_ancestor_of(35, $post) || in_category(35)) && $post->post_type == 'post' && is_search()) {
	$essay = true;
	$news = false;
} elseif ($post->post_type == 'post') {
	$essay = false;
	$news = true;
} else {
	$essay = false;
	$news = false;
}
//SEARCH RESULTS

 ?>



			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
	
        
      
      


    <?php 
          if ($essay) { ?>
        <?php  include(TEMPLATEPATH.'/essayloopitem.php');  ?>
          
         <?php  } else { ?>
         <?php  include(TEMPLATEPATH.'/newsloopitem.php');  ?>
         <?php } ?>
	

		

			</div><!-- .post -->







<?php endwhile; ?>





			<div id="nav-below" class="navigation">

				<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'sandbox' )) ?></div>

				<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'sandbox' )) ?></div>
				<div class="clear"></div>
			</div>


</div>