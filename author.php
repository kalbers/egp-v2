<?php get_header() ?>
<h2 class="entry-title"><a href="<?php bloginfo('url'); ?>"><?php echo get_the_title(110); ?> </a> &raquo; <?php the_post() ?>
			<?php printf( __( 'Author Archives: <span class="vcard">%s</span>', 'sandbox' ), "<a class='url fn n' href='$authordata->user_url' title='$authordata->display_name' rel='me'>$authordata->display_name</a>" ) ?></h2>			<?php $authordesc = $authordata->user_description; if ( !empty($authordesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $authordesc . '</div>' ); ?>
<?php rewind_posts() ?>
   <?php include( TEMPLATEPATH.'/postlist.php'); ?><?php get_footer() ?>
		