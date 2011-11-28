<div id="comments">
	<!-- Prevents loading the file directly -->
	<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
	    <?php die(__('Please do not load this page directly or we will hunt you down. Thanks and have a great day!', 'whiteboard')); ?>
	<?php endif; ?>
	
	<!-- Password Required -->
	<?php if(!empty($post->post_password)) : ?>
	    <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
	    <?php endif; ?>
	<?php endif; ?>
	
	<?php $i++; ?> <!-- variable for alternating comment styles -->
	<?php if($comments) : ?>
		<h3><?php comments_number(__('No Comments', 'whiteboard'), __('1 Comment', 'whiteboard'),  __('% Comments', 'whiteboard')); ?></h3>
	    <ol>
	    <?php foreach($comments as $comment) : ?>
	    	<?php $comment_type = get_comment_type(); ?> <!-- checks for comment type -->
	    	<?php if($comment_type == 'comment') { ?> <!-- outputs only comments -->
		        <li id="comment-<?php comment_ID(); ?>" class="comment <?php if($i&1) { echo 'odd';} else {echo 'even';} ?> <?php $user_info = get_userdata(1); if ($user_info->ID == $comment->user_id) echo 'authorComment'; ?> <?php if ($comment->user_id > 0) echo 'user-comment'; ?>">
		            <?php if ($comment->comment_approved == '0') : ?> <!-- if comment is awaiting approval -->
		                <p class="waiting-for-approval">
		                	<em><?php _e('Your comment is awaiting approval.', 'whiteboard'); ?></em>
		                </p>
		            <?php endif; ?>
		            <div class="comment-text">
			            <?php comment_text(); ?>
		            </div><!--.commentText-->
		            <div class="comment-meta">
		            	<?php edit_comment_link(__('Edit Comment', 'whiteboard'), '', ''); ?>
                  <?php printf(__('%1$s by %2$s on %3$s at %4$s', 'whiteboard'),
                               get_comment_type(), get_comment_author_link(),
                               get_comment_date(), get_comment_time()); ?>
		            	<p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar($comment, '36'); } ?></p>
		            </div><!--.commentMeta-->
		        </li>
			<?php } else { $trackback = true; } ?>
	    <?php endforeach; ?>
	    </ol>
	    <?php if ($trackback == true) { ?><!-- checks for comment type: trackback -->
	    <h3><?php _e('Trackbacks', 'whiteboard'); ?></h3>
		    <ol>
		    	<!-- outputs trackbacks -->
			    <?php foreach ($comments as $comment) : ?>
				    <?php $comment_type = get_comment_type(); ?>
				    <?php if($comment_type != 'comment') { ?>
					    <li><?php comment_author_link() ?></li>
				    <?php } ?>
			    <?php endforeach; ?>
		    </ol>
	    <?php } ?>
	<?php else : ?>
	    <p><?php _e('No comments yet. You should be kind and add one!', 'whiteboard'); ?></p>
	<?php endif; ?>
	
	<div id="comments-form">
		<?php if(comments_open()) : ?>
		    <?php if(get_option('comment_registration') && !$user_ID) : ?>
            <?php $login_link = get_option('siteurl') . "/wp-login.php?redirect_to=" . urlencode(get_permalink()); ?>
		        <p><?php printf(__('Our apologies, you must be <a href="%s">logged in</a> to post a comment.', 'whiteboard'), $login_link); ?></p>
        <?php else : ?>
		        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		            <?php if($user_ID) : ?>
                  <?php
                    $profile_link = get_option('siteurl') . "/wp-admin/profile.php";
                    $logout_link = get_option('siteurl') . "/wp-login.php?action=logout";
                  ?>
                    <p></p>
		                <p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>', 'whiteboard'),
                              $profile_link, $user_identity, $logout_link); ?></p>
		            <?php else : ?>
		            	<p>
		            		<?php _e('Allowed HTML tags: ', 'whiteboard'); ?><?php echo allowed_tags(); /* outputs the html tags that are allowed in comments */ ?>
		            	</p>
		                <p>
							<label for="author"><small><?php _e('Name ', 'whiteboard'); ?><?php if($req) echo __("(required)", 'whiteboard'); ?></small></label>
							<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
		                </p>
		                <p>
		                	<label for="email"><small><?php _e('Mail (will not be published) ', 'whiteboard'); ?><?php if($req) echo __("(required)", 'whiteboard'); ?></small></label>
		                	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
		                </p>
		                <p>
		                	<label for="url"><small><?php _e('Website', 'whiteboard'); ?></small></label>
		                	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
		                </p>
		            <?php endif; ?>
		            <p>
		            	<label for="comment"><small><?php _e('Comment', 'whiteboard'); ?></small></label>
		            	<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
		            </p>
		            <p>
		            	<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'whiteboard'); ?>" />
		            	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		            </p>
		            <?php do_action('comment_form', $post->ID); ?>
		        </form>
				<p><small><?php printf(__('By submitting a comment you grant %s a perpetual license to reproduce your words and name/web site in attribution. Inappropriate and irrelevant comments will be removed at an admin’s discretion. Your email is used for verification purposes only, it will never be shared.', 'whiteboard'), get_bloginfo('name', 'display')); ?></small></p>
		    <?php endif; ?>
		<?php else : ?>
		    <p><?php _e('The comments are closed.', 'whiteboard'); ?></p>
		<?php endif; ?>
	</div><!--#commentsForm-->
</div><!--#comments-->
