<?php
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
			$content .= 'Comments are open! <a href="'.get_permalink().'">Add yours!</a>';
		}
	}
	return $content;
}
