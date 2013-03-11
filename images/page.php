<?php get_header() ?>

<?php if ($post->ID == '461' ) { //EVENT LISTING PAGE  ?>

<?php wp_list_pages('child_of=468&title_li='  ); ?><br/><br/>




<?php $temp_query = $wp_query; ?>
<?php

$args=array(
    'post_type'=>'page',
    'post_parent' => array(461)
 );

//The Query
query_posts($args);
$events = array();
if ( have_posts() ) : while ( have_posts() ) : the_post();


global $more;
$more = 0;

//The code must be inserted ahead of the call to the content





if (get('start-date')) {

  $sysdate = strtotime(get('start-date'));
  $thisevent = array($sysdate => array('startdate' => get('start-date'),'enddate' => get('end-date'), 'no-end-date' => get('no-end-date'),'location' => get('location'), 'title' => get_the_title(), 'content' => get_the_content('Continue reading ' . get_the_title('', '', false), FALSE), 'time' => get('time'), 'url' => get_permalink($post->ID)));
  $events = $events + $thisevent;

  }

endwhile; else:
endif;
arsort($events);


//Reset Query
wp_reset_query();

?>
<?php $wp_query = $temp_query; ?>

<?php

$currhtml;
$archhtml;
$todays_date = date("F j, Y"); 
$today = strtotime($todays_date); 

foreach ($events as $events) {
  $eventdate = strtotime($events['startdate']);

   if  ($eventdate >= $today) {
      if ($events["no-end-date"] != "1") {$theenddate = "-".$events["enddate"];} else {$theenddate='';}
      if ($events["time"] != "") {$thetime = "-".$events["time"];} else {$thetime='';} 
      $currhtml .= '<li class="event"><h3 class="post-list-title">'.$events["startdate"].'<br/><a href="'.$events["url"] .'">'.$events["title"] .', '.$events["location"] .'</a></h3><div class="entry-content">'.$events["content"] .'</div></li>';

  }
    elseif  ($eventdate < $today) {
      if ($events["no-end-date"] != "1") {$theenddate = "-".$events["enddate"];} else {$theenddate='';}
      if ($events["time"] != "") {$thetime = "-".$events["time"];} else {$thetime='';} 
      $archhtml .= '<li class="event"><h3 class="post-list-title">'.$events["startdate"].'<br/><a href="'.$events["url"] .'">'.$events["title"] .', '.$events["location"] .'</a></h3><div class="entry-content">'.$events["content"] .'</div></li>';
    }
  } ?>

<h2 class="entry-title">
<img src="<?php bloginfo('stylesheet_directory') ?>/images/sidebar-title-events.png" alt="Upcoming Events">
</h2>
<ul>
<?php echo $currhtml; ?>
</ul>

<h2 class="entry-title">
<img src="<?php bloginfo('stylesheet_directory') ?>/images/title-archived-events.png" alt="Archived Events">
</h2>
<ul>
<?php echo $archhtml; ?>
</ul>




<?php } elseif ($post->post_parent == 461) { // EVENT CHILDREN  ?> 
event child

<?php } else { ?>

<?php wp_list_pages('child_of='.$post->ID.'&title_li='  ); ?>


			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
<?php the_content() ?>

<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>

<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->

<?php /*if ( get_post_custom_values('comments') )*/ comments_template() // Add a key+value of "comments" to enable comments on this page ?>

<?php } ?>

<?php get_footer() ?>