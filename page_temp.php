<?php
    global $post;
    $myposts = get_posts('child_of='.get_the_ID().'&post_type=page');
    foreach($myposts as $post) : ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>: <?php echo get_post_meta($post->ID, descript, true) ?></li>
    <?php endforeach; ?>



<?php /*
if ( is_page() ) {
  $page = get_query_var('page_id');
  $children = wp_list_pages('title_li=&amp;child_of='.$page.'&amp;echo=0');
  if ($children) { ?>
    <ul>
    <?php echo $children; ?>
    </ul>
    <?php
  }
}
?>

<br>
<?php $temp_query = clone $wp_query;  ?>


<?php
echo $post->ID;
?>fdffddf<?php
$postargs=array(
    'post_type'=>'page',
   // 'child_of' => $post->ID,
    'post_parent' => $post->ID
 );
//The Query
query_posts($postargs);

?>

<?php 
while ( have_posts() ) : the_post(); 
echo $post->ID;
endwhile; 
wp_reset_query();
?>
<?php $wp_query = clone $wp_query;  ?>


<?php if ( is_page() ) { ?>

<li><ul>
<?php
wp_list_pages('title_li=&child_of='.$post->ID.''); ?>
</ul></li>

<?php }   */ ?>