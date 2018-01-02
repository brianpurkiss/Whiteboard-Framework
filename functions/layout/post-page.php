<?php

// custom excerpt ellipses for 2.9+
function custom_excerpt_more($more) {
	return 'Read More &raquo;';
}
add_filter('excerpt_more', 'custom_excerpt_more');
// no more jumping for read more link
function no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'&nbsp; Continue Reading &raquo;'.'</a>';
}
add_filter('excerpt_more', 'no_more_jumping');
