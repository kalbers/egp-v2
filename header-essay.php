<?php include(TEMPLATEPATH . "/header-scripts.php"); ?>
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
      </div>
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
  <div class="header-mural"> </div>
</div>
<div id="main-content" class="main-panel">
<div class="content-header-strip"></div>
<h2 class="entry-title">
<span class="alignright" id="header-links"> <span class='st_sharethis' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>' displayText='Share This'></span> <a href="JavaScript:window.print();" class="icon-sprite icon-print">Print this page</a> </span><img src="<?php bloginfo('stylesheet_directory') ?>/images/title-essays.png" alt="Essays">
</h2>
<div id="sidebar-wrap">
  <?php include( TEMPLATEPATH . '/sidebar.php' ); ?>
</div>
<div class="main-content-body">
