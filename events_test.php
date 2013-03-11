<?php/*Template Name: Events  Test Page*/?>
<?php get_header() ?>
<?php the_post(); ?>
<?php //$thecomments = get_include_contents(comments_template()); ?>
<?php if ($post->ID == '461' ) { //EVENT LISTING PAGE  ?>

<?php $fillercontent = get_the_content(); ?>

<?php


//The Query
$event_listing = new WP_Query('post_type=page&post_parent=461');
$events = array();
if ( $event_listing->have_posts() ) : while ( $event_listing->have_posts() ) : $event_listing->the_post();


global $more;
$more = 0;

//The code must be inserted ahead of the call to the content





if (get('start-date')) {

  $sysdate = strtotime(get('start-date'));
  $thisevent = array($sysdate => array('startdate' => get('start-date'),'enddate' => get('end-date'), 'no-end-date' => get('no-end-date'),'location' => get('location'), 'title' => get_the_title(), 'content' => get_the_content(' &raquo; Read more about this event', FALSE), 'time' => get('time'), 'url' => get_permalink($post->ID), 'links' => wp_list_pages('child_of='.$post->ID.'&title_li=&echo=0'  )));
  $events = $events + $thisevent;

  }

endwhile; else:
endif;
arsort($events);



?>

<?php
$currhtml;
$archhtml;
$eventhtml;
$todays_date = date("F j, Y"); 
$today = strtotime($todays_date); 

foreach ($events as $event) {
  $eventdate = strtotime($event['startdate']);
   if ($event["no-end-date"] != "1") {$theenddate = "-".$event["enddate"];} else {$theenddate='';}
      if ($event["time"] != "") {$thetime = ", ".$event["time"];} else {$thetime='';} 
       if ($event["links"] != "") {$subpages = '<div class="sub-pages"><h3 class="widget-title"><em>'.$event["title"].' </em>Resources</h3><ul>'.$event["links"].'</ul></div>'; } else {$subpages='';}
      $eventhtml = '<li class="event"><h3 class="post-list-title">'.$event["startdate"].$theenddate.$thetime.'&mdash;<a href="'.$event["url"] .'">'.$event["title"] .'</a></h3><div class="entry-content">'.$event["content"] .'<p><br/><strong>Location:</strong> '.$event["location"] .$subpages.'</div></li>';
 
    if  ($eventdate >= $today && $event["title"] != '') {
     $currhtml .= $eventhtml;
    }
    elseif  ($eventdate < $today) {
      $archhtml .= $eventhtml;
    }
  } ?>

<h2 class="entry-title">
<img src="<?php bloginfo('stylesheet_directory') ?>/images/sidebar-title-events.png" alt="Upcoming Events">
</h2>
<ul class="post-list">
<?php if ($currhtml != '') {echo $currhtml;} else {echo '<h3 class="post-list-title">'.$fillercontent.'</h3><br/>';} ?>
</ul>


<h2 class="entry-title mid-page">
<img src="<?php bloginfo('stylesheet_directory') ?>/images/title-archived-events.png" alt="Archived Events">
</h2>
<ul class="post-list">
<?php echo $archhtml; ?>

</ul>




<?php } elseif ($post->post_parent == 461 && $post->ID != 461) { // EVENT CHILDREN  ?> 

<?php 
      if (get("no-end-date") != "1") {$theenddate = "-".get("end-date");} else {$theenddate='';}
      if (get("time") != "") {$thetime = ", ".get("time");} else {$thetime='';}
      if (get("location") != "") {$thelocation = "<p><strong>Location: </strong>".get("location").'</p>';} else {$thelocation='';}
 ?>



			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><a href="<?php the_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a></h2>
				<div class="entry-content event">
        
        <h3 class="post-list-title">
        <?php echo get("start-date").$theenddate.$thetime.'&mdash;'.get_the_title(); ?>
        </h3>
        
        <?php echo $thelocation; ?>
        
    <?php the_content(); ?>

    <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>

    <?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->

<?php /*if ( get_post_custom_values('comments') )*/ comments_template() // Add a key+value of "comments" to enable comments on this page ?>


<?php } ?>
<?php get_footer() ?>