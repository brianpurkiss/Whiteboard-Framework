<?php get_header(); ?>
<div id="content">
	<?php
		if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
	    else :
			$curauth = get_userdata(intval($author));
		endif;
	?>
	<div class="author">
		<h1><?php _e('About:'); ?> <?php echo $curauth->display_name; ?></h1>
		<p class="avatar"><?php if(function_exists('get_avatar')) { echo get_avatar( $curauth->user_email, $size = '180' ); } /* Displays the Gravatar based on the author's email address. Visit Gravatar.com for info on Gravatars */ ?></p>
		
		<?php if($curauth->description !="") { /* Displays the author's description from their Wordpress profile */ ?>
			<p><?php echo $curauth->description; ?></a></p>
		<?php } ?>
	</div><!--.author-->

	<div id="recent-author-posts">
		<h3><?php _e('Recent Posts by '); echo $curauth->display_name; ?></h3>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); /* Displays the most recent posts by that author. Note that this does not display custom content types */ ?>
			<?php static $count = 0;
			if ($count == "5") // Number of posts to display
            	{ break; }
			else { ?>
				<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
				<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
				<div class="post-excerpt">
					<?php the_excerpt(); /* the excerpt is loaded to avoid duplicate content */ ?>
				</div><!--.postContent-->
				<div class="post-meta">
					<p><?php _e('Written on '); the_time('F j, Y'); _e(' at '); the_time() ?></p>
					<p><?php _e('Categories: '); the_category(', ');?></p>
					<p><?php the_tags('<br />Tags: ', ', ', ' '); ?></p>
				</div><!--.postMeta-->
			<?php $count++; } ?>
		<?php endwhile; else: ?>
			<p><?php _e('No posts by '); echo $curauth->display_name; ?> yet.</p>
		<?php endif; ?>
	</div><!--#recentPosts-->

	<div id="recent-author-comments">
		<h3><?php _e('Recent Comments by '); echo $curauth->display_name; ?></h3>
		<?php
			$number=5; // number of recent comments to display
			$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' and comment_author_email='$curauth->user_email' ORDER BY comment_date_gmt DESC LIMIT $number");
		?>
		<ul>
			<?php
				if ( $comments ) : foreach ( (array) $comments as $comment) :
				echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_date(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
			endforeach; else: ?>
             	<p><?php _e('No comments by '); echo $curauth->display_name; ?></p>
			<?php endif; ?>
		</ul>
	</div><!--#recentAuthorComments-->
</div><!--#content-->
<?php get_footer(); ?>