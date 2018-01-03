<?php

// Adds general WP Theme Support elements
require get_template_directory() . '/functions/setup/theme-support.php';

// Handles WordPress Menues
require get_template_directory() . '/functions/setup/menus.php';

// Widgets
require get_template_directory() . '/functions/setup/widgets.php';

// Enqueue Scripts
require get_template_directory() . '/functions/setup/enqueue.php';


//
// Layout support
//

// Adds classes and IDs to content areas
require get_template_directory() . '/functions/layout/class-id.php';

// Comments
require get_template_directory() . '/functions/layout/comments.php';

// Post/page
require get_template_directory() . '/functions/layout/post-page.php';

// Minor security improvements
require get_template_directory() . '/functions/layout/security.php';
