<?php
  load_theme_textdomain("whiteboard", get_template_directory() . '/languages');

  // enables wigitized sidebars
	if ( function_exists('register_sidebar') )

	// Sidebar Widget
	// Location: the sidebar
	register_sidebar(array('name'=>__('Sidebar', 'whiteboard'),
		'before_widget' => '<div class="widget-area widget-sidebar"><ul>',
		'after_widget' => '</ul></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Header Widget
	// Location: right after the navigation
	register_sidebar(array('name'=>__('Header', 'whiteboard'),
		'before_widget' => '<div class="widget-area widget-header"><ul>',
		'after_widget' => '</ul></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	// Footer Widget
	// Location: at the top of the footer, above the copyright
	register_sidebar(array('name'=>__('Footer', 'whiteboard'),
		'before_widget' => '<div class="widget-area widget-footer"><ul>',
		'after_widget' => '</ul></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	// The Alert Widget
	// Location: displayed on the top of the home page, right after the header, right before the loop, within the content area
	register_sidebar(array('name'=>__('Alert', 'whiteboard'),
		'before_widget' => '<div class="widget-area widget-alert"><ul>',
		'after_widget' => '</ul></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	// post thumbnail support
	add_theme_support( 'post-thumbnails' );

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header-menu' => __('Header Menu', 'whiteboard'),
	  		  'sidebar-menu' => __('Sidebar Menu', 'whiteboard'),
	  		  'footer-menu' => __('Footer Menu', 'whiteboard'),
	  		  'logged-in-menu' => __('Logged In Menu', 'whiteboard')
	  		)
	  	);
	}

	// custom background support
	add_custom_background();

	// custom header image support
	define('NO_HEADER_TEXT', true );
	define('HEADER_IMAGE', '%s/images/default-header.png'); // %s is the template dir uri
	define('HEADER_IMAGE_WIDTH', 1068); // use width and height appropriate for your theme
	define('HEADER_IMAGE_HEIGHT', 300);
	// gets included in the admin header
	function admin_header_style() {
	    ?><style type="text/css">
	        #headimg {
	            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
	            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	        }
	    </style><?php
	}
	add_custom_image_header( '', 'admin_header_style' );

	// adds Post Format support
	// learn more: http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) );

	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	// Removes Trackbacks from the comment cout
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}

	// invite rss subscribers to comment
	function rss_comment_footer($content) {
		if (is_feed()) {
			if (comments_open()) {
				$content .= printf(__('Comments are open! <a href="%s">Add yours!</a>', 'whiteboard'), get_permalink());
			}
		}
		return $content;
	}

	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return __('Read More &raquo;', 'whiteboard');
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	// no more jumping for read more link
	function no_more_jumping($post) {
		return printf(__('<a href="%s" class="read-more">&nbsp; Continue Reading &raquo;</a>', 'whiteboard'), get_permalink($post->ID));
	}
	add_filter('excerpt_more', 'no_more_jumping');
	
	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');
	
	
	// add_action( 'admin_init', 'theme_options_init' );
	// add_action( 'admin_menu', 'theme_options_add_page' );
	
	// Init plugin options to white list our options
	// function theme_options_init(){
	// 	register_setting( 'tat_options', 'tat_theme_options', 'theme_options_validate' );
	// }
	
	// Load up the menu page
	// function theme_options_add_page() {
	// 	add_theme_page( __( 'Theme Options', 'tat_theme' ), __( 'Theme Options', 'tat_theme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
	// }

/**
 * Returns a link to the author page of the author of the current post.
 *
 * This is a modified version of the_author_posts_link() without the depricated
 * part.
 *
 * @link http://codex.wordpress.org/Template_Tags/the_author_posts_link
 * @see the_author_posts_link()
 * @uses $authordata The current author's DB object.
 * @uses get_author_posts_url()
 * @uses get_the_author()
 */
  function get_the_author_posts_link() {
    global $authordata;
    if ( !is_object( $authordata ) )
      return false;
    $link = sprintf(
      '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
      get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
      esc_attr( sprintf( __( 'Posts by %s', 'whiteboard' ), get_the_author() ) ),
      get_the_author()
    );
    return apply_filters( 'the_author_posts_link', $link );
  }
?>
