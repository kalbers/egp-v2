<?php the_post(); ?>
<?php if ($post->ID == 383 ) { //ESSAYS LISTING PAGE  ?>
<?php //header ('HTTP/1.1 301 Moved Permanently');
  	header ('Location: '.get_category_link( 35 ));
	
}
	?>
