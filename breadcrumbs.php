<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence 
 */
?>

<?php if ( is_front_page() ) { ?>

<?php } else { ?>
<?php the_breadcrumb(); ?>

<?php } ?>

<?php // To add breadcrumbs to frontpage, delete the above php and uncomment the first two slashes below
// <?php the_breadcrumb(); ?>
