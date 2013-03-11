<?php get_header() ?>

	<h2 class="entry-title"><img src="<?php bloginfo('stylesheet_directory') ?>/images/title-blog.png" alt="Blog"></h2>   
    <?php   $my_query = new WP_Query(array('cat' => '-35', 'post__not_in' => get_option('sticky_posts'), 'paged' => $paged)); ?>       
	<?php include( TEMPLATEPATH.'/postlist.php'); ?>
<?php get_footer() ?>