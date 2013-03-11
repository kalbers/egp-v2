<?php get_header() ?>
<?php the_post() ?>

<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?> post-list">
<h2 class="entry-title">
  <div id="nav-above" class="navigation"> <span class="nav-previous">
    <?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> Older' ) ?>
    </span> <span class="nav-next">
    <?php next_post_link( '%link', 'Newer <span class="meta-nav">&raquo;</span>' ) ?>
    </span> </div>
  <img src="<?php bloginfo('stylesheet_directory') ?>/images/title-blog.png" alt="Blog"> </h2>
<h3 class="post-list-title">
  <?php if ( $post->post_type == 'post' && is_search()) { ?>
  News:
  <?php } ?>
  <a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'sandbox'), the_title_attribute('echo=0') ) ?>" rel="bookmark">
  <?php if ( $post->post_type == 'page') {$parent_title = get_the_title($post->post_parent);
if ($parent_title != get_the_title()) {echo $parent_title;}} ?>
  <?php the_title() ?>
  </a></h3>
<div class="entry-meta">
  <?php if ( $post->post_type == 'post' ) { ?>
  <span class="author vcard"><?php printf( __( 'By %s', 'sandbox' ), '<a class="url fn n" href="' . get_author_link( false, $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( __( 'View all posts by %s', 'sandbox' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></span> <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>">
  <?php unset($previousday); printf( __( 'on %1$s, %2$s', 'sandbox' ), the_date( '', '', '', false ), get_the_time('g:ia') ) ?>
  </abbr></span> <span class="cat-links"><?php printf( __( 'in %s', 'sandbox' ), get_the_category_list(', ') ) ?></span>
  <?php } ?>
</div>
<div class="entry-content"> <?php echo get_the_content() ?>
  <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>') ?>
</div>
<div class="entry-meta foot"> <span class="comments-link">
  <?php comments_popup_link( __( '<img src="'. get_bloginfo("stylesheet_directory").'/images/icon-comments.png" alt="Edit"> Comment on this Post', 'sandbox' ), __( '<img src="'. get_bloginfo("stylesheet_directory").'/images/icon-comments.png" alt="Edit"> Comments (1)', 'sandbox' ), __( '<img src="'. get_bloginfo("stylesheet_directory").'/images/icon-comments.png" alt="Edit"> Comments (%)', 'sandbox' ) ) ?>
  </span>
  <?php edit_post_link( __( '<img src="'. get_bloginfo("stylesheet_directory").'/images/icon-edit.png" alt="Edit">', 'sandbox' ), "\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
  <?php the_tags( __( '<span class="tag-links">Tags: ', 'sandbox' ), ", ", "</span>" ) ?>
  <div class="clear"></div>
</div>
<?php comments_template() ?>
<?php get_footer() ?>
