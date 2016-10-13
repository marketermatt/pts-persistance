<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<!--[if IE 7]>
<link href="ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="header">
    <a href="<?php echo home_url();?>">
        <div id="title"><h1>
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Logo')) : ?>
                <?php bloginfo('name'); ?>
            <?php endif; ?>
        </h1></div>
        <div id="slogan"><h2><?php bloginfo('description'); ?></h2></div>
    </a>
</div>

<div id="wrapper">

  <div id="navouter">
    <div id="navinner">
      <div id="navleft">
        <div id="navright">
          <div id="nav"><?php get_template_part('navigation','index'); ?>  <?php // if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu')) : ?><?php // endif; ?></div>
        </div>
      </div>
    </div>
  </div>
  
<div id="banner"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Banner')) : ?>
    <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
<?php endif; ?></div>
	<div id="contentwrapper" class="clear">

        <div id="breadcrumbs">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                if ( !is_front_page() )
                    yoast_breadcrumb();
            }else{
                get_template_part('breadcrumbs','index');
            }
        ?>
        </div>