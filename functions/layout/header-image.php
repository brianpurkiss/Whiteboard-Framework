<?php
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
