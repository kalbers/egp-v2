<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
<title>
<?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?>
</title>
<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory') ?>/reset-min.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
<?php wp_head() // For plugins ?>
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/jquery.color.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/egp.js"></script>
<!--[if IE 6]>  
	  <script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/js/DD_belatedPNG_0.0.7a-min.js"></script>
	  <script type="text/javascript">DD_belatedPNG.fix('#header-top a, #header-top img, #header-mid a, #header-mid li, .entry-title, .entry-title img, .entry-meta img');</script>  
	  <![endif]-->
</head>
