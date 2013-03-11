<?php get_header() ?>
<?php the_post(); ?>
<?php //$thecomments = get_include_contents(comments_template()); ?>
<?php if ($post->ID == '461' ) { //EVENT LISTING PAGE  ?>

<?php $fillercontent = get_the_content(); ?>

<?php


//The Query

//$event_listing = new WP_Query(array('meta_key'=>'start-date','orderby'=>'meta_value_num','order','DESC','post_type'=>'page','post_parent'=>'461','paged' => $paged));
$event_listing = new WP_Query(array('post_type'=>'page','post_parent'=>'461','paged' => $paged));
$events = array();

echo '<div style="display:none">';
print_r($event_listing);
echo '</div>';

if ( $event_listing->have_posts() ) : while ( $event_listing->have_posts() ) : $event_listing->the_post();


global $more;
$more = 0;

//The code must be inserted ahead of the call to the content





if (get('start-date')) {

  $sysdate = strtotime(get('start-date'));
  $systime = explode("-", get('time'));
  $sysStartTime = strtotime($systime[0], $sysdate);
  if ($sysStartTime) {
    $sysdate = $sysStartTime;
  }
  $thisevent = array($sysdate => array('startdate' => get('start-date'),'enddate' => get('end-date'), 'no-end-date' => get('no-end-date'),'location' => get('location'), 'title' => get_the_title(), 'content' => get_the_content(' &raquo; Read more about this event', FALSE), 'time' => get('time'), 'url' => get_permalink($post->ID), 'links' => wp_list_pages('child_of='.$post->ID.'&title_li=&echo=0'  )));
  $events = $events + $thisevent;

  }

endwhile; else:
endif;
ksort($events);

echo '<div style="display:none">';
print_r($events);
echo '</div>';
?>
<?php ?>
<?php
$currhtml;
$archhtml;
$eventhtml;
$todays_date = date("F j, Y"); 
$today = strtotime($todays_date); 
$archevents = array();

foreach ($events as $key => $event) {
  $eventdate = strtotime($event['startdate']);
   if ($event["no-end-date"] != "1") {$theenddate = "-".$event["enddate"];} else {$theenddate='';}
   if ($event["time"] != "") {$thetime = ", ".$event["time"];} else {$thetime='';} 
   if ($event["links"] != "") {$subpages = '<div class="sub-pages"><h3 class="widget-title"><em>'.$event["title"].' </em>Resources</h3><ul>'.$event["links"].'</ul></div>'; } else {$subpages='';}
      $eventhtml = '<li class="event"><h3 class="post-list-title">'.$event["startdate"].$theenddate.$thetime.'&mdash;<a href="'.$event["url"] .'">'.$event["title"] .'</a></h3><div class="entry-content">'.apply_filters('the_content',$event["content"]) .'<p><br/><strong>Location:</strong> '.$event["location"] .$subpages.'</div></li>';
 
    if  ($eventdate >= $today && $event["title"] != '') {
     $currhtml .= $eventhtml;
    }
    elseif  ($eventdate < $today) {
      $archevents[$key] = $event;
     // $archhtml .= $eventhtml;
    }
  } ?>
<?php if ($paged == 0) { ?>
    <h2 class="entry-title">
    <img src="<?php bloginfo('stylesheet_directory') ?>/images/sidebar-title-events.png" alt="Upcoming Events">
    </h2>
    <ul class="post-list events">
    <?php if ($currhtml != '') {echo $currhtml;} else {echo '<h3 class="post-list-title">'.$fillercontent.'</h3><br/>';} ?>
    </ul>
<?php } ?>

<h2 class="entry-title <?php if ($paged == 0) { ?>mid-page<?php } ?>">
<img src="<?php bloginfo('stylesheet_directory') ?>/images/title-archived-events.png" alt="Archived Events">
</h2>
<ul class="post-list events">
<?php 
echo '<div style="display:none">';
//print_r($archevents);
echo '</div>';

krsort($archevents);
foreach ($archevents as $event) {
  $eventdate = strtotime($event['startdate']);
   if ($event["no-end-date"] != "1") {$theenddate = "-".$event["enddate"];} else {$theenddate='';}
   if ($event["time"] != "") {$thetime = ", ".$event["time"];} else {$thetime='';} 
   if ($event["links"] != "") {$subpages = '<div class="sub-pages"><h3 class="widget-title"><em>'.$event["title"].' </em>Resources</h3><ul>'.$event["links"].'</ul></div>'; } else {$subpages='';}
      $eventhtml = '<li class="event"><h3 class="post-list-title">'.$event["startdate"].$theenddate.$thetime.'&mdash;<a href="'.$event["url"] .'">'.$event["title"] .'</a></h3><div class="entry-content">'.apply_filters('the_content',$event["content"]) .'<p><br/><strong>Location:</strong> '.$event["location"] .$subpages.'</div></li>';

      $archhtml .= $eventhtml;
  }
 ?>
 <?php echo $archhtml; ?>

</ul>

<div id="nav-below" class="navigation">

				<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Next Page', 'sandbox' ), $event_listing->max_num_pages) ?></div>

				<div class="nav-next"><?php previous_posts_link(__( 'Previous Page <span class="meta-nav">&raquo;</span>', 'sandbox' ), $event_listing->max_num_pages) ?></div>
				<div class="clear"></div>
</div>



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