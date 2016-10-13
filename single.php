<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence
 */

get_header(); ?>

	<div id="content" class="clearfix">

		<div id="main-wm">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<div class="entry">
				<?php the_content('<p class="serif">'.__('Read the rest of this entry','persistence').' &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','persistence').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>'.__('Tags:','persistence').' ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						<?php __('This entry was posted','persistence'); ?>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/wordpress/time-since/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						<?php _e('on','persistence'); ?> <?php the_time('l, F jS, Y') ?> <?php _e('at','persistence'); ?> <?php the_time() ?>
						<?php _e('and is filed under','persistence'); ?> <?php the_category(', ') ?>.
						<?php _e('You can follow any responses to this entry through the','persistence');?> <?php post_comments_feed_link('RSS 2.0'); ?> <?php _e('feed.','persistence'); ?>

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							<?php _e('You can','persistence'); ?> <a href="#respond"><?php _e('leave a response','persistence'); ?>'</a>, <?php _e('or','persistence');?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php _e('trackback','persistence'); ?></a> <?php _e('from your own site.','persistence'); ?>

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							<?php _e('Responses are currently closed, but you can','persistence'); ?> <a href="<?php trackback_url(); ?> " rel="trackback"><?php _e('trackback','persistence'); ?></a> <?php _e('from your own site.','persistence'); ?>

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','persistence'); ?>

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.','persistence'); ?>

						<?php } edit_post_link(__('Edit this entry','persistence'),'','.'); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>
<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.','persistence'); ?></p>

<?php endif; ?>

</div><!-- end main-wm -->

<div id="right">
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Column')) : ?><?php endif; ?>
		</div>

	</div><!-- end content -->
</div><!-- end contentwrapper -->
  
<?php //include (TEMPLATEPATH . '/bottomwidgets.php'); ?>
<?php get_template_part('bottomwidgets','index'); ?>

<?php get_footer(); ?>