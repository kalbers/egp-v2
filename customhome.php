<?php /*Template Name: Home Page*/ ?>
<?php get_header() ?>
<?php the_post(); ?>
<?php 
$link1url = get('link-1-url'); 
$link1text = get('link-1-text'); 
$link2url = get('link-2-url'); 
$link2text = get('link-2-text');
$link3url = get('link-3-url'); 
$link3text = get('link-3-text');
$image = get("randomimage");
$imgcaption = get("img-caption");
$imglink = get("img-url");
?>

<div class="home-content"><img id="home-byline" title="Connecting the Past with the Present, Building Community, Creating a Legacy" src="<?php bloginfo('stylesheet_directory') ?>/images/home-byline.png" alt="Connecting the Past with the Present, Building Community, Creating a Legacy" width="539" height="74" />
  <div class="home-rand-img"><?php echo get_image('randomimage'); ?>
    <div class="home-rand-caption">
      <?php if ($imglink != "") { ?>
      <a href="<?php echo $imglink; ?>" target="_blank">
      <?php } ?>
      <?php echo $imgcaption; ?>
      <?php if ($imglink != "") { ?>
      </a>
      <?php } ?>
    </div>
  </div>
  <div id="home-content-text"> <?php echo get('introduction'); ?> </div>
  <div class="clear-left"></div>
  <div id="home-extra-links"><?php if ($link1text != '') { ?><a href="<?php echo $link1url; ?>" class="button-link"><?php echo $link1text; ?></a><?php } if ($link2text != '') { ?><a href="<?php echo $link2url; ?>" class="button-link"><?php echo $link2text; ?></a><?php } if ($link3text != '') { ?><a href="<?php echo $link3url; ?>" class="button-link"><?php echo $link3text; ?></a><?php } ?></div>
</div>
<?php get_image('randomimage'); ?>
<?php  /* $tracklist = get_field_duplicate('randomimage');shuffle($tracklist);foreach($tracklist as $track){$randimg = $track['o'];break;} */   ?>
<!--<img src="<?php echo $randimg; ?>">-->

<?php  /* $total = get_field_duplicate('randomimage');  ?>
<?php print_r($total); ?>

<?php foreach ($total as $thing1) { ?>
<?php echo "<div class='event-wrap'>";
print_r($val['o']);
      $thing = get_image($thing);
	  echo $thing;
	  unset($thing);
      echo "</div>"; ?>

<?php  } */  ?>
<div class="home-cat-list">
  <div class="content-header-strip"></div>
  <div id="home-cat-list-header" class="double-title">
    <h2>
      <ul class="alignright home-cat-list-links">
        <li><a class="icon-sprite icon-list" href="<?php echo get_category_link(35); ?>">Browse A-Z</a></li>
        <li><a class="icon-sprite icon-search trigger-search" href="#">Search All Topics</a></li>
        <li><a class="icon-sprite icon-philly" href="/geographic-resources">Geographic Resources</a></li>
      </ul>
      <img src="<?php bloginfo('stylesheet_directory') ?>/images/title-browse-essays.png" alt="Browse Essays"></h2>
  </div>
  <?php cat_col_list(35, 3); ?>
</div>
<div id="home-featured-essays">
  <div class="content-header-strip"></div>
  <div id="featured-essay-header" class="double-title">
    <h2><a class="alignright" href="<?php echo get_permalink(383);?>">&raquo; Read and Comment on all Essays</a><img src="<?php bloginfo('stylesheet_directory') ?>/images/home-title-essays.png" alt="Featured Essays"></h2>
  </div>
  <?php
$loopnum = 0;
//The Query
$my_query = new WP_Query(array('orderby' => 'title', 'order' => 'ASC', 'cat' => '35', 'paged' => $paged, 'posts_per_page' => '200') );
if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
?>
  <?php 
$theauthor = get('theauthor');
$permalink = get_permalink();
 ?>
  <?php if (get('featured') == 1) { ?>
  <div class="featured-essay <?php if ($loopnum == 0) {echo 'first';} ?>">
    <h3><a href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a></h3>
    <div class="desc">
      <?php if (get('thumbnail')) { ?>
      <div class="thumb"><?php echo get_image('thumbnail'); ?></div>
      <?php } ?>
      <?php echo get('summary'); ?>
      <div class="link">&raquo; <a href="<?php echo $permalink; ?>">Read this essay, by <?php echo $theauthor; ?></a></div>
    </div>
    <?php /* edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' )  */ ?>
    <div class="clear"></div>
  </div>
  <?php
$loopnum++; 
}

//one loop
//exit;
endwhile;
endif;
 ?>
</div>
<?php get_footer() ?>
