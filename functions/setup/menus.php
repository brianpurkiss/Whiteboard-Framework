<?php

// custom menu support
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
				'header-menu' => 'Header Menu',
				'sidebar-menu' => 'Sidebar Menu',
				'footer-menu' => 'Footer Menu',
				'logged-in-menu' => 'Logged In Menu'
			)
		);
}
