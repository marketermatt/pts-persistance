<?php
/**
 * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage Persistence
 */
?>

  <div id="footertop"></div>
  <div id="footerwrapper">
    <div id="footer">
      <div id="footermenu">
	  <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Links')) : ?><?php endif; ?>
	 </div>
      <div id="copyright"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Info')) : ?><?php endif; ?></div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>