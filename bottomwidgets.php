<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence
 */
?>
<div id="bottomwrapper">
    <div id="bottomwidgets" class="clearfix">
	<div id="bwleft"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Left')) : ?><?php endif; ?></div>
	<div id="bwcenter"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Center')) : ?><?php endif; ?></div>
	<div id="bwright"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Right')) : ?><?php endif; ?></div>
	</div>
</div>