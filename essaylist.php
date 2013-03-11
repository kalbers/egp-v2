<div class="post-list">
<?php
 if ($my_query) {
   if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
      include(TEMPLATEPATH.'/essayloopitem.php'); 
    endwhile; endif;
 } else {
   
  // get the current category
  $category = get_cat_ID(single_cat_title("", false));
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<?php 
if (get_option('sticky_posts')) {
  // LOOP 1 get the sticky post in the category, order by title - ascending
    $my_query = new WP_Query(array( 'post__in' => get_option('sticky_posts'), 'orderby' => 'title', 'order' => 'ASC' , 'cat' => ''.$category.'', 'paged' => $paged ));

    if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
     ?>
     <div class="sticky">
       <?php 
      include(TEMPLATEPATH.'/essayloopitem.php'); 
      ?>
      </div>
      <?php  endwhile; endif; ?>
  <?php } ?>
  <?php 
  // LOOP 2 get everything else in the category, order by title - ascending
  $my_query = new WP_Query(array( 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'title', 'order' => 'ASC' , 'cat' => ''.$category.'', 'paged' => $paged ));
  if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
   ?>

    <?php include(TEMPLATEPATH.'/essayloopitem.php'); ?>
    
   

  <?php endwhile; endif; ?>


<?php } ?>


			
</div>