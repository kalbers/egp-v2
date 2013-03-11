<?php get_header() ?>
<h2 class="entry-title"><a href="<?php bloginfo('url'); ?>"><?php echo get_the_title(110); ?> </a> &raquo; 
<?php the_post() ?>

<?php if ( is_day() ) : ?>
			<?php printf( __( '<span>%s</span>', 'sandbox' ), get_the_time(get_option('date_format')) ) ?>
<?php elseif ( is_month() ) : ?>
			<?php printf( __( '<span>%s</span>', 'sandbox' ), get_the_time('F Y') ) ?>
<?php elseif ( is_year() ) : ?>
			<?php printf( __( '<span>%s</span>', 'sandbox' ), get_the_time('Y') ) ?>
<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
			<?php _e( 'Archives', 'sandbox' ) ?>
<?php endif; ?>
</h2> 
<?php rewind_posts() ?>
   <?php include( TEMPLATEPATH.'/postlist.php'); ?><?php get_footer() ?>
		