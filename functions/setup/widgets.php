<?php

// enables wigitized sidebars
if ( function_exists('register_sidebar') )

// Sidebar Widget
// Location: the sidebar
register_sidebar(array('name'=>'Sidebar',
	'before_widget' => '<div class="widget-area widget-sidebar"><ul>',
	'after_widget' => '</ul></div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));
// Header Widget
// Location: right after the navigation
register_sidebar(array('name'=>'Header',
	'before_widget' => '<div class="widget-area widget-header"><ul>',
	'after_widget' => '</ul></div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));
// Footer Widget
// Location: at the top of the footer, above the copyright
register_sidebar(array('name'=>'Footer',
	'before_widget' => '<div class="widget-area widget-footer"><ul>',
	'after_widget' => '</ul></div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));
// The Alert Widget
// Location: displayed on the top of the home page, right after the header, right before the loop, within the content area
register_sidebar(array('name'=>'Alert',
	'before_widget' => '<div class="widget-area widget-alert"><ul>',
	'after_widget' => '</ul></div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));
