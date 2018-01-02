<?php
	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));

	// removes the WordPress version from your header for security
	function wb_remove_version() {
		return '<!--built on the Whiteboard Framework-->';
	}
	add_filter('the_generator', 'wb_remove_version');
