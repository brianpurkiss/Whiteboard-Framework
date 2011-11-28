<?php get_header(); ?>
<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

			<article>
				<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<?php edit_post_link('<small>' . __('Edit this entry', 'whiteboard') . '</small>','',''); ?>
				<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
				<div class="post-content">
					<?php the_content(); ?>
					<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
				</div><!--.post-content-->
			</article>

			<div id="post-meta">
				<p>
          <?php printf(__('Posted on %1$s at %2$s', 'whiteboard'), get_the_time(__('F j, Y', 'whiteboard')), get_the_time()); ?>
				</p>
				<p>
					<?php comments_popup_link(__('No Comments', 'whiteboard'), __('1 Comment', 'whiteboard'),  __('% Comments', 'whiteboard')); ?>
				</p>
				<p>
					<?php _e('Categories:', 'whiteboard') ?> <?php the_category(', ') ?>
					<br />
					<?php if (the_tags(__('Tags: ', 'whiteboard'), ', ', ' ')); ?>
				</p>
				<p>
					<?php _e('Receive new post updates: ', 'whiteboard'); ?><a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow"><?php _e('Entries (RSS)', 'whiteboard'); ?></a>
					<br />
					<?php _e('Receive follow up comments updates: ', 'whiteboard'); ?><?php comments_rss_link('RSS 2.0'); ?>
				</p>
			</div><!--#post-meta-->

			<?php /* If a user fills out their bio info, it's included here */ ?>
			<div id="post-author">
				<h3><?php printf(__('Written by %s', 'whiteboard'), get_the_author_posts_link()); ?></h3>
				<p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '80' ); /* This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address */  } ?></p>
				<div id="authorDescription">
					<?php the_author_meta('description') ?> 
					<div id="author-link">
						<p><?php printf(__('View all posts by: %s', 'whiteboard'), get_the_author_posts_link()); ?></p>
					</div><!--#author-link-->
				</div><!--#author-description -->
			</div><!--#post-author-->

		</div><!-- #post-## -->

		<div class="newer-older">
			<div class="older">
				<p>
          <?php previous_post_link('%link', __('&laquo; Previous post', 'whiteboard')) ?>
				</p>
			</div><!--.older-->
			<div class="newer">
				<p>
          <?php next_post_link('%link', __('Next post &raquo;', 'whiteboard')) ?>
				</p>
			</div><!--.older-->
		</div><!--.newer-older-->

		<?php comments_template( '', true ); ?>

	<?php endwhile; /* end loop */ ?>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
