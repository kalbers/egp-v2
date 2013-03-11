<?php get_header(); ?>

  <?php  if(is_category(35)) { //parent essay group ?>
    <h2 class="entry-title">  
 
    			<?php _e( 'Essays', 'sandbox' ) ?>
    </h2>
    <?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
    <?php 
	$my_query = new WP_Query(array('orderby' => 'title', 'order' => 'ASC', 'cat' => '35', 'paged' => $paged, 'posts_per_page' => '200') );
    include(TEMPLATEPATH.'/essaylist.php'); ?>
      
    <?php  } elseif( cat_is_ancestor_of(35, $cat)) { //child essay ?>
    <h2 class="entry-title">  
 
    			<?php _e( 'Essays ', 'sandbox' ) ?><span>&raquo; <?php single_cat_title(); ?></span>
    </h2>
    <?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
    <?php 
    include(TEMPLATEPATH.'/essaylist.php'); ?>
      
  <?php } else { //all other ?>
    <h2 class="entry-title"><a href="<?php bloginfo('url'); ?>"><?php echo get_the_title(110); ?></a> &raquo; 
    			<?php _e( 'Category:', 'sandbox' ) ?> <span><?php single_cat_title() ?></span>
    </h2>
    <?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
    <?php 
    include( TEMPLATEPATH.'/postlist.php'); ?>
  <?php } ?>
 <?php get_footer() ?>
		