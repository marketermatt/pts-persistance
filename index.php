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

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    <?php } ?>
					<?php
                        if ( ! has_excerpt() ) {
                            the_content('Read the rest of this entry &raquo;');
                        } else {
                            the_excerpt();
                            echo '<br/>';
                            ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="more-link">
                                Continue...
                            </a>
                            <?php
                        }
                    ?>
				</div>
                <div style="clear: both;"></div>
				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> <?php _e('Posted in','persistence'); ?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; '.__('Older Entries','persistence')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries','persistence').' &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('Not Found','persistence'); ?></h2>
		<p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.','persistence'); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
		</div>

		<div id="right">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Column')) : ?><?php endif; ?>
		</div>

	</div><!-- end content -->
</div><!-- end contentwrapper -->
  
<?php get_template_part('bottomwidgets','index'); ?>

<?php get_footer(); ?>
