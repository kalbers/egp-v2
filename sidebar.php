<?php
if (is_single() || is_page()) {
   // BUILD ESSAY META ARRAYS
    $thepostid = $post->ID;
   $attachments = get_children(array(
   'post_type' => 'attachment',
   'post_status' => null,
   'post_parent' => $thepostid,
   //'post_mime_type' => 'image',
   'order' => 'ASC',
   'orderby' => 'menu_order ID'));
//echo '<!--'; print_r($attachments); echo ' -->';
   $att_images = array();
   $att_other = array();
   foreach ($attachments as $att) {
     $image_check = strpos($att->post_mime_type, 'image');
     if ($image_check !== false) {
       $att_images[] = $att;
     } elseif ($image_check === false) {
       $att_other[]  = $att;
     }
    }
}


// IS THIS AN ESSAY?
if ( cat_is_ancestor_of(35, $post)  || cat_is_ancestor_of(35, $cat) || in_category(35)) {
?>
<?php
if (is_single()) {//post or event
?>

<div class="sidebar secondary">
  <div class="widget" id="widget-subpage">
    <?php if (get('bibliography') || get('collections') || get('places')) { ?>
    <h3 class="widget-title">Essay Links</h3>
    <ul class="essay-links">
      <?php if (get('bibliography')) { ?>
      <li class="icon-sprite icon-biblio"><a href="#header-biblio">Bibliography</a></li>
      <?php } ?>
      <?php if (get('collections')) { ?>
      <li class="icon-sprite icon-resources"><a href="#header-collections">Collections</a></li>
      <?php } ?>
      <?php if (get('places')) { ?>
      <li class="icon-sprite icon-places"><a href="#header-places">Places to Visit</a></li>
      <?php } ?>
      <li class="icon-sprite icon-comments" ><a href="#comments">Comments</a>
    </ul>
    <div class="clear"></div>
    <?php } ?>
  </div>
  <?php  if ($att_images) {  ?>
    <?php include( TEMPLATEPATH.'/widget-image-gallery.php'); ?>
  <?php } ?>
  <?php if (get_group('External Resources') || $att_other) { ?>
  <div id="widget-media-links" class="widget">
  <h3 class="widget-title">Media Links</h3>
  <ul class="list-media-gallery">
    <?php 
        if (get_group('External Resources')) {
          foreach(get_group('External Resources') as $resource) {
              echo '<li class="icon-sprite icon-'.strtolower($resource[external_resource_type][1]).'"><a target="_blank" href="'.$resource[external_resource_url][1].'">'.$resource[external_resource_name][1].'</a></li>';
            };
          }
    
        ?>
    <?php
        if ($att_other) {
        foreach($att_other as $att) {
           $class = explode('/',$att->post_mime_type);
           echo '<li class="icon-sprite icon-'.strtolower($class[0]).'"><a href="'.wp_get_attachment_url($att->ID).'">'.$att->post_title.'</a></li>';
    
        } ?>
    <?php } ?>
    </div>
  </ul>
  <?php } ?>
  </ul>
</div>
<?php //RELATED ESSAYS
        $related_posts_html = MRP_get_related_posts_html(  $thepostid );
        if ($related_posts_html) { ?>
<div class="sidebar secondary">
  <div class="widget"> <?php echo $related_posts_html; ?> </div>
</div>
<?php } ?>
<?php //end is_single() 
    } ?>
<div class="sidebar secondary">
  <div class="widget 2col essays" id="widget-cat2col">
    <h3 class="widget-title"> <a class="alignright icon-sprite icon-list" href="<?php echo get_category_link(35); ?>">Browse A-Z</a> Browse Essays </h3>
    <?php echo cat_col_list(35,2); ?>
    <div class="clear"></div>
    <div class="widget-text-block">
      <strong>Interested in other topics?</strong><br/>
      <p>Join the discussion at a <a href="http://egp-sandbox.camden.rutgers.edu/about/the-greater-philadelphia-roundtable/">Greater Philadelphia Roundtable</a> or <a href="http://egp-sandbox.camden.rutgers.edu/archive/welcome-to-the-encyclopedia-of-greater-philadelphia/">add your nomination</a> online.</p>
    </div>
  </div>
</div>

<!--<div class="sidebar secondary">
		<ul class="xoxo"> 
<?php   
  // if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) {}
?>
  </ul>
</div>
-->
<?php } elseif (!is_page() || is_single() || is_home()) { ?>
  
<div class="secondary sidebar">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : // begin secondary sidebar widgets ?>
    <?php endif; // end secondary sidebar widgets  ?>
</div>
<div id="primary" class="sidebar">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : // begin primary sidebar widgets ?>
    <?php endif; // end primary sidebar widgets  ?>
</div>
<!-- #primary .sidebar --> 
<!-- #secondary .sidebar -->

<?php } else { 
    
  if  ($post->ID != 461) {
    $childlist= wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
    
    if($post->post_parent && $post->post_parent != 461 && !$childlist) {
    $title = '<h3 class="widget-title">'.get_the_title($post->post_parent).'</h3>';
    $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
  } else {
  $title = '<h3 class="widget-title">'.get_the_title($post->ID).'</h3>';
  $children = $childlist;
  }
  if ($children) { ?>
<div class="sidebar secondary">
  <div class="widget" id="widget-subpage"> <?php echo $title.'<ul>'.$children.'</ul>'; ?> </div>
</div>
<?php  } }   ?>
<?php  if ($att_images) {  ?>
  <div class="sidebar secondary">
    <?php include( TEMPLATEPATH.'/widget-image-gallery.php'); ?>
    </div>
<?php } ?>
<div id="primary" class="sidebar">
  <ul class="xoxo"><li>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : // begin primary sidebar widgets ?>
    <?php endif; // end primary sidebar widgets  ?>
 </li> </ul>
</div>
<!-- #primary .sidebar -->

<?php } ?>
