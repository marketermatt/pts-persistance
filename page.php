<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence
 */

get_header(); ?>

<div id="content" class="clearfix">
	<div id="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
			<div class="entry">
				<?php the_content('<p class="serif">'.__('Read the rest of this page','persistence').' &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','persistence').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link(__('Edit this entry.','persistence'), '<p>', '</p>'); ?>
	
	<?php comments_template(); ?>

	</div>

	</div><!-- end content -->
</div><!-- end contentwrapper -->
  
<?php get_template_part('bottomwidgets','index'); ?>

<?php get_footer(); ?>