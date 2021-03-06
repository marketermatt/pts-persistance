<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
		body { margin: 3px; }
	</style>

</head>
<body id="commentspopup">

<h1 id="header"><a href="" title="<?php echo get_option('blogname'); ?>"><?php echo get_option('blogname'); ?></a></h1>

<?php
/* Don't remove these lines. */
add_filter('comment_text', 'popuplinks');
if ( have_posts() ) :
while ( have_posts() ) : the_post();
?>
<h2 id="comments"><?php _e('Comments','persistence'); ?></h2>

<p><a href="<?php echo get_post_comments_feed_link($post->ID); ?>"><abbr title="Really Simple Syndication"><?php _e('RSS','persistence');?></abbr> <?php _e('feed for comments on this post.','persistence'); ?></a></p>

<?php if ( pings_open() ) { ?>
<p><?php _e('The','persistence');?> <abbr title="Universal Resource Locator"><?php _e('URL','persistence'); ?></abbr> <?php _e('to TrackBack this entry is:','persistence'); ?> <em><?php trackback_url() ?></em></p>
<?php } ?>

<?php
// this line is WordPress' motor, do not delete it.
$commenter = wp_get_current_commenter();
extract($commenter);
$comments = get_approved_comments($id);
$post = get_post($id);
if ( post_password_required($post) ) {  // and it doesn't match the cookie
	echo(get_the_password_form());
} else { ?>

<?php if ($comments) { ?>
<ol id="commentlist">
<?php foreach ($comments as $comment) { ?>
	<li id="comment-<?php comment_ID() ?>">
	<?php comment_text() ?>
	<p><cite><?php comment_type(__('Comment','persistence'), __('Trackback','persistence'), __('Pingback','persistence')); ?> <?php _e('by','persistence'); ?> <?php comment_author_link() ?> &#8212; <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></cite></p>
	</li>

<?php } // end for each comment ?>
</ol>
<?php } else { // this is displayed if there are no comments so far ?>
	<p><?php _e('No comments yet.','persistence'); ?></p>
<?php } ?>

<?php if ( comments_open() ) { ?>
<h2><?php _e('Leave a comment','persistence'); ?></h2>
<p><?php _e('Line and paragraph breaks automatic, e-mail address never displayed','persistence'); ?>, <acronym title="Hypertext Markup Language"><?php _e('HTML</acronym> allowed:','persistence');?> <code><?php echo allowed_tags(); ?></code></p>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
	<p><?php _e('Logged in as','persistence');?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out','persistence'); ?> &raquo;</a></p>
<?php else : ?>
	<p>
	  <input type="text" name="author" id="author" class="textarea" value="<?php echo esc_attr($comment_author); ?>" size="28" tabindex="1" />
	   <label for="author"><?php _e('Name','persistence'); ?></label>
	</p>

	<p>
	  <input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="28" tabindex="2" />
	   <label for="email"><?php _e('E-mail','persistence'); ?></label>
	</p>

	<p>
	  <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="28" tabindex="3" />
	   <label for="url"><abbr title="Universal Resource Locator"><?php _e('URL','persistence'); ?></abbr></label>
	</p>
<?php endif; ?>

	<p>
	  <label for="comment"><?php _e('Your Comment','persistence'); ?></label>
	<br />
	  <textarea name="comment" id="comment" cols="70" rows="4" tabindex="4"></textarea>
	</p>

	<p>
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	  <input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER["REQUEST_URI"]); ?>" />
	  <input name="submit" type="submit" tabindex="5" value="Say It!" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>
</form>
<?php } else { // comments are closed ?>
<p><?php _e('Sorry, the comment form is closed at this time.','persistence'); ?></p>
<?php }
} // end password check
?>

<div><strong><a href="javascript:window.close()"><?php _e('Close this window.','persistence'); ?></a></strong></div>

<?php // if you delete this the sky will fall on your head
endwhile; //endwhile have_posts()
else: //have_posts()
?>
<p><?php _e('Sorry, no posts matched your criteria.','persistence'); ?></p>
<?php endif; ?>
<!-- // this is just the end of the motor - don't touch that line either :) -->
<?php //} ?>
<p class="credit"><?php timer_stop(1); ?> <cite><?php _e('Powered by','persistence'); ?> <a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform"><strong><?php _e('WordPress','persistence'); ?></strong></a></cite></p>
<?php // Seen at http://www.mijnkopthee.nl/log2/archive/2003/05/28/esc(18) ?>
<script type="text/javascript">
<!--
document.onkeypress = function esc(e) {
	if(typeof(e) == "undefined") { e=event; }
	if (e.keyCode == 27) { self.close(); }
}
// -->
</script>
</body>
</html>