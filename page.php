<?php get_header() ?>
<?php the_post(); ?>
<?php //$thecomments = get_include_contents(comments_template()); ?>


			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
<?php the_content() ?>

<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>

<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->



<?php /*if ( get_post_custom_values('comments') )*/ comments_template(); //echo $thecomments;  // Add a key+value of "comments" to enable comments on this page ?>


<?php get_footer() ?>