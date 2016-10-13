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

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php _e('Archive for the','persistence');?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','persistence');?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php _e('Posts Tagged','persistence');?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php _e('Archive for','persistence');?> <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php _e('Archive for','persistence');?> <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php _e('Archive for','persistence');?> <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php _e('Author Archive','persistence'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Blog Archives','persistence');?></h2>
 	  <?php } ?>


		

		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<div class="entry">
					<?php the_content() ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> <?php _e('Posted in','persistence'); ?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;','persistence'), __('1 Comment &#187;','persistence'), __('% Comments &#187;','persistence')); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','persistence')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','persistence')) ?></div>
		</div>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf(__('<h2 class="center">Sorry, but there aren\'t any posts in the %s category yet.</h2>','persistence'), single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			_e('<h2>Sorry, but there aren\'t any posts with this date.</h2>','persistence');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_user_by('slug',get_query_var('author_name'));
			printf(__('<h2 class="center">Sorry, but there aren\'t any posts by %s yet.</h2>','persistence'), $userdata->display_name);
		} else {
			_e('<h2 class="center">No posts found.</h2>','persistence');
		}
		get_search_form();

	endif;
?>

</div><!-- end main-wm -->

<div id="right">
			<?php get_sidebar(); ?>
</div>

	</div><!-- end content -->
</div><!-- end contentwrapper -->
  
<?php get_template_part('bottomwidgets','index'); ?>

<?php get_footer(); ?>
