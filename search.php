<?php get_header() ?>

<?php if ( have_posts() ) : ?>
<h2 class="entry-title">Site Search:</a> <span class="arrow"></span>  

"<?php the_search_query() ?>"
</h2> 

   <?php include( TEMPLATEPATH.'/postlist.php'); ?>
   
 <?php else : ?>



			<div id="post-0" class="post no-results not-found">

				<h2 class="entry-title"><?php _e( 'Nothing Found', 'sandbox' ) ?> for "<?php the_search_query() ?>"</h2>

				<div class="entry-content">

					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'sandbox' ) ?></p>

				</div>

				<form id="searchform-no-results" class="blog-search" method="get" action="<?php bloginfo('home') ?>">

					<div>

						<input id="s-no-results" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />

						<input class="button" type="submit" value="<?php _e( 'Find', 'sandbox' ) ?>" />

					</div>

				</form>

			</div><!-- .post -->



<?php endif; ?>  
   
   <?php get_footer() ?>
		