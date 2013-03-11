<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />

<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

<?php egp_scripts(); ?>


<!--[if IE 6]>  
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/DD_belatedPNG_0.0.7a-min.js"></script>
    <script type="text/javascript">DD_belatedPNG.fix('#header-top a, #header-top img, #header-mid a, #header-mid li, .entry-title, .entry-title img, .entry-meta img');</script>  
    <![endif]-->

<?php wp_head() // For plugins ?>
</head>

<body class="<?php sandbox_body_class() ?>">
<div id="header-strip"></div>
<div id="wrapper" class="hfeed">
<div id="header-top">
  <h1 id="site-title"><span><a href="<?php bloginfo('home') ?>/" title="<?php echo wp_specialchars( get_bloginfo('name'), 1 ) ?>" rel="home">
    <?php bloginfo('name') ?>
    </a></span></h1>
  <div id="site-search">
    <form id="searchform" class="blog-search" method="get" action="<?php bloginfo('home') ?>">
      <div> <span class="searchlabel">
        <button class="header-submit" type="submit" value=""></button>
        <input id="s" name="s" type="text" class="empty header-search" value="<?php //the_search_query() ?>" size="14" tabindex="1" />
        </span> </div>
    </form>
  </div>
  <a href="/archive/category/essays/" class="header-search-browse">Browse Essays A-Z</a>
  <div class="clear"></div>
</div>
<div id="header-mid" class="main-panel">
  <div id="site-nav">
    <?php sandbox_globalnav() ?>
    <?php /* wp_list_pages('title_li=&sort_column=menu_order')  */ ?>
  </div>
  <div class="header-mural"></div>
</div>
<div id="main-content" class="main-panel">
<div class="content-header-strip"></div>
<div id="sidebar-wrap">
  <?php include( TEMPLATEPATH . '/sidebar.php' ); ?>
</div>
<div class="main-content-body">
