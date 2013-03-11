<?php /*Template Name: Essay Page*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
$title = get_the_title();



//	$var_content = get_the_content();
//	$var_content = apply_filters( 'the_content', $var_content );
// $var_content = str_replace( ']]>', ']]>', $var_content );


$author = get("theauthor");
$bibliography = get("bibliography"); 
$collections = get("collections");
$places = get("places");
$copyright = get("copyright");

?>

<div id="post-<?php get_the_ID() ?>" class="<?php sandbox_post_class() ?>">
  <h3 class="post-list-title"><?php echo $title; ?></h3>
  <div class="essay-author">By <?php echo $author;  ?></div>
  <div class="entry-content">
    <?php the_content(); ?>
    <?php if ($copyright != '') { ?>
    <p><br/>
      <?php echo apply_filters('the_content',$copyright); ?><br/>
    </p>
    <?php } ?>
    <?php if ($bibliography != '') { ?>
    <h3 class="essay-sub-header" id="header-biblio">Bibliography</h3>
    <div class="entry-biblio"> <?php echo apply_filters('the_content',$bibliography); ?> </div>
    <?php } ?>
    <?php if ($collections != '') { ?>
    <h3 class="essay-sub-header" id="header-collections">Collections</h3>
    <div class="entry-collections"> <?php echo apply_filters('the_content',$collections); ?> </div>
    <?php } ?>
    <?php if ($places != '') { ?>
    <h3 class="essay-sub-header" id="header-places">Places to Visit</h3>
    <div class="entry-places"> <?php echo apply_filters('the_content',$places); ?> </div>
    <?php } ?>
  </div>
</div>
<div id="comments" class="essay-comments">
  <h3 class="essay-sub-header">&nbsp;</h3>
  <p class="comment-prompt">Suggestions and corrections to this essay are welcome.  How does your life story connect with this essay?  How and why do you think this topic is important?  How does this topic connect Philadelphia with the region, the nation, and the world? </p>
  <?php comments_template() // Add a key+value of "comments" to enable comments on this page ?>
</div>
<?php endwhile; endif;
//Reset Query
wp_reset_query();
 get_footer() ?>
