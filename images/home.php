<?php/*Template Name: Home Page*/?><?php get_header() ?>
<?php the_post() ?><div class="main-content-body">
<div class="home-content"><img id="home-byline" title="Generate, assemble, and disseminiate new knowledge about one of America's greatest citites" src="http://philadelphiaencyclopedia.org/v2/wp-content/uploads/2009/12/home-byline.png" alt="Generate, assemble, and disseminiate new knowledge about one of America's greatest citites" width="567" height="69" /><div class="home-rand-img"></div><div id="home-content-text"><?php the_content() ?></div><div id="home-extra-link"><a class="home-extra-link">learn more</a></div></div>
<?php /* $tracklist = get_field_duplicate('randomimage');shuffle($tracklist);foreach($tracklist as $track){$randimg = $track['o'];break;} */   ?><!--<img src="<?php echo $randimg; ?>">-->    <div id="home-featured-essays"><div class="content-header-strip"></div>
<div class="double-title"><h2><img src="<?php bloginfo('stylesheet_directory') ?>/images/home-title-essays.png" alt="Featured Essays"></h2><a class="alignright" href="">Read and Comment on all Essays</a></div>
<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

			    
</div>


<?php get_footer() ?>