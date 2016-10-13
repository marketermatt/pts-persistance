<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence
 *  
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','persistence'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
<div class="clearfix"></div>
<?php if ( have_comments() ) : ?>
	<h2 id="comments" style="border-bottom: 1px dotted rgba(221, 175, 80, 0.45); padding-bottom: 25px;"><?php comments_number('No Responses', 'One Response', '% Responses' );?> <?php _e('to','persistence'); ?> &#8220;<?php the_title(); ?>&#8221;</h2>

	
	<div class="commentlist">
        <?php wp_list_comments(array('callback' => 'pts_comment_callback')); ?>
    </div>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
        <div class="navigation">
            <div class="nav-previous"><?php previous_comments_link('<span class="meta-nav">&larr;</span> '.__('Older Comments', 'persistence')); ?></div>
            <div class="nav-next"><?php next_comments_link(__('Newer Comments', 'persistence').' <span class="meta-nav">&rarr;</span>'); ?></div>
        </div><!-- .navigation -->
    <?php endif; // check for comment navigation ?>

	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. 
		<p class="nocomments">Comments are closed.</p> -->

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

    <?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>