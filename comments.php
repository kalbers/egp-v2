<?php
	if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
		die ( 'Please do not load this page directly. Thanks.' );
?>

<div class="content-header-strip comments"></div>
<div id="comments">
  <?php
	if ( !empty($post->post_password) ) :
		if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
  <div class="nopassword">
    <?php _e( 'This post is protected. Enter the password to view any comments.', 'sandbox' ) ?>
  </div>
</div>
<!-- .comments -->
<?php
		return;
	endif;
endif;
?>
<?php if ( $comments ) : ?>
<?php global $sandbox_comment_alt ?>
<?php // Number of pings and comments
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
	get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>
<?php if ( $comment_count ) : ?>
<?php $sandbox_comment_alt = 0 ?>
<h2 class="sub-entry-title"><span class="alignright comment-count"><?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'sandbox') : __('<span>One</span> Comment', 'sandbox'), $comment_count) ?> </span><img src="<?php bloginfo('stylesheet_directory') ?>/images/title-comments.png" alt="Comments"> </h2>
<div id="comments-list" class="comments">
  <h3></h3>
  <ol>
    <?php foreach ($comments as $comment) : ?>
    <?php if ( get_comment_type() == "comment" ) : ?>
    <li id="comment-<?php comment_ID() ?>" class="<?php sandbox_comment_class() ?>">
      <div class="comment-bubble-top"></div>
      <div class="comment-bubble-mid">
        <div class="comment-content">
          <div class="comment-links"> <a href="#comment-<?php comment_ID(); ?>" title="Permalink to this comment"><img src="<?php bloginfo('stylesheet_directory') ?>/images/icon-link.png" alt="Permalink"></a>
            <?php edit_comment_link(__('<img src="'. get_bloginfo("stylesheet_directory").'/images/icon-edit.png" alt="Edit">', 'sandbox'), '<span class="edit-link">', '</span>'); ?>
          </div>
          <div class="comment-text">
            <?php comment_text() ?>
          </div>
          <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'sandbox') ?>
        </div>
      </div>
      <div class="comment-bubble-bottom"></div>
      <span class="comment-author vcard">
      <?php sandbox_commenter_link() ?>
      </span> <span class="comment-meta"><?php printf(__('Posted %1$s at %2$s', 'sandbox'),										get_comment_date(),										get_comment_time()										); ?> </span>
      <div class="clear"></div>
    </li>
    <?php endif; // REFERENCE: if ( get_comment_type() == "comment" ) ?>
    <?php endforeach; ?>
  </ol>
</div>
<!-- #comments-list .comments -->

<?php endif; // REFERENCE: if ( $comment_count ) ?>
<?php endif // REFERENCE: if ( $comments ) ?>
<?php if ( 'open' == $post->comment_status ) : ?>
<?php $req = get_option('require_name_email'); // Checks if fields are required. Thanks, Adam. ;-) ?>
<div id="respond">
  <h2 class="sub-entry-title"> <span class="alignright comment-count"><?php printf( __( '<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'sandbox' ),								get_bloginfo('wpurl') . '/wp-admin/profile.php',								wp_specialchars( $user_identity, 1 ),								get_bloginfo('wpurl') . '/wp-login.php?action=logout&amp;redirect_to=' . get_permalink() ) ?></span> <img src="<?php bloginfo('stylesheet_directory') ?>/images/title-addcomment.png" alt="Add a Comment">
    <?php if ( $user_ID ) : ?>
    <?php endif ?>
  </h2>
  <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
  <p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'sandbox'),
					get_bloginfo('wpurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>
  <?php else : ?>
  <div class="formcontainer">
    <form id="commentform" action="<?php bloginfo('wpurl') ?>/wp-comments-post.php" method="post">
      <div class="comment-bubble-top"></div>
      <div class="comment-bubble-mid">
        <div class="comment-content">
          <?php if ( $user_ID ) : ?>
          <?php else : ?>
          <p id="comment-notes"><strong>
            <?php _e( 'Your email is <em>never</em> shared.', 'sandbox' ) ?>
            <?php if ($req) _e( 'Required fields are marked <span class="required">*</span>', 'sandbox' ) ?>
            </strong></p>
          <div class="comment-group-required">
            <div class="form-label">
              <label for="author">
                <?php _e( 'Name', 'sandbox' ) ?>
              </label>
              <?php if ($req) _e( '<span class="required">*</span>', 'sandbox' ) ?>
            </div>
            <div class="form-input">
              <input id="author" name="author" class="text<?php if ($req) echo ' required'; ?>" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="50" tabindex="3" />
            </div>
            <div class="form-label">
              <label for="email">
                <?php _e( 'Email', 'sandbox' ) ?>
              </label>
              <?php if ($req) _e( '<span class="required">*</span>', 'sandbox' ) ?>
            </div>
            <div class="form-input">
              <input id="email" name="email" class="text<?php if ($req) echo ' required'; ?>" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" />
            </div>
          </div>
          <div class="comment-group-website">
            <div class="form-label">
              <label for="url">
                <?php _e( 'Website', 'sandbox' ) ?>
              </label>
            </div>
            <div class="form-input">
              <input id="url" name="url" class="text" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" />
            </div>
          </div>
          <?php endif // REFERENCE: * if ( $user_ID ) ?>
          <div class="form-textarea">
            <textarea id="comment" name="comment" class="text required" cols="45" rows="8" tabindex="6"></textarea>
          </div>
        </div>
      </div>
      <div class="comment-bubble-bottom"></div>
      <div class="form-submit">
        <input id="submit" name="submit" class="button" type="submit" value="<?php _e( 'Post Comment', 'sandbox' ) ?>" tabindex="7" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id ?>" />
      </div>
      <div class="form-option">
        <?php do_action( 'comment_form', $post->ID ) ?>
      </div>
    </form>
    <!-- #commentform --> 
  </div>
  <!-- .formcontainer -->
  <?php endif // REFERENCE: if ( get_option('comment_registration') && !$user_ID ) ?>
  <?php if ($comments) : ?>
  <?php if ( $ping_count ) : ?>
  <?php $sandbox_comment_alt = 0 ?>
  <div class="content-header-strip comments"/>
  <h2 class="sub-entry-title"><img src="<?php bloginfo('stylesheet_directory') ?>/images/title-trackbacks.png" alt="Comments"> <span class="alignright comment-count"><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'sandbox') : __('<span>One</span> Trackback', 'sandbox'), $ping_count) ?></span></h2>
  <div id="trackbacks-list" class="comments">
    <ol>
      <?php foreach ( $comments as $comment ) : ?>
      <?php if ( get_comment_type() != "comment" ) : ?>
      <li id="comment-<?php comment_ID() ?>" class="<?php sandbox_comment_class() ?>">
        <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'sandbox'),									get_comment_author_link(),									get_comment_date(),									get_comment_time() );									edit_comment_link(__('Edit', 'sandbox'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
        <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'sandbox') ?>
        <?php comment_text() ?>
      </li>
      <?php endif // REFERENCE: if ( get_comment_type() != "comment" ) ?>
      <?php endforeach; ?>
    </ol>
  </div>
  <!-- #trackbacks-list .comments -->
  <?php endif // REFERENCE: if ( $ping_count ) ?>
  </div>
  <?php endif ?>
  <!-- REFERENCE: if($comments) --> 

</div>
<!-- #respond -->
<?php endif // REFERENCE: if ( 'open' == $post->comment_status ) ?>
</div>
<!-- #comments --> 
