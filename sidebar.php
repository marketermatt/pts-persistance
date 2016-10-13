<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence
 */
?>
	<div id="sidebar" role="complementary">
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<li>
				<?php get_search_form(); ?>
			</li>

			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>Author</h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p><?php _e('You are currently browsing the archives for the','persistence'); ?> <?php single_cat_title(''); ?> <?php _e('category.','persistence'); ?></p>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<p><?php _e('You are currently browsing the','persistence'); ?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php bloginfo('name'); ?></a> <?php _e('blog archives for the day','persistence'); ?>
			 <?php the_time('l, F jS, Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p><?php _e('You are currently browsing the','persistence');?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php bloginfo('name'); ?></a> <?php _e('blog archives for','persistence'); ?> <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p><?php _e('You are currently browsing the','persistence');?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php bloginfo('name'); ?></a> <?php _e('blog archives for the year','persistence');?> <?php the_time('Y'); ?>.</p>

			<?php /* If this is a search result */ } elseif (is_search()) { ?>
			<p><?php _e('You have searched the','persistence'); ?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php bloginfo('name'); ?></a> <?php _e('blog archives for','persistence'); ?> <strong>'<?php the_search_query(); ?>'</strong>. <?php _e('If you are unable to find anything in these search results, you can try one of these links.','persistence'); ?></p>

			<?php /* If this set is paginated */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p><?php _e('You are currently browsing the','persistence');?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php bloginfo('name'); ?></a> <?php _e('blog archives.','persistence');?></p>

			<?php } ?>

			</li>
		<?php }?>
		</ul>
		<ul role="navigation">
			<?php wp_list_pages('title_li=<h2>'.__('Pages','persistence').'</h2>' ); ?>

			<li><h2><?php _e('Archives','persistence'); ?></h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

			<?php wp_list_categories('show_count=1&title_li=<h2>'.__('Categories','persistence').'</h2>'); ?>
		</ul>
		<ul>
			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>

				<li><h2><?php _e('Meta','persistence'); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="<?php echo VALIDATION_URL; ?>" title="This page validates as XHTML 1.0 Transitional"><?php _e('Valid','persistence'); ?> <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="<?php echo GMPG; ?>"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="<?php echo WP_ORG; ?>" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			<?php } ?>

			<?php endif; ?>
		</ul>
	</div>

