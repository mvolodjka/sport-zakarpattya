<div class="sidebar-right row">
    <?php
	if ( function_exists('dynamic_sidebar') )
		dynamic_sidebar('sidebar-right');
	?>
    <?php require "templates/exclusive-sidebar-block.php";
	?>
</div>