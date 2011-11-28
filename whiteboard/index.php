<?php get_header(); ?>
	<div id="content">
		<?php if ( ! dynamic_sidebar( 'Alert' ) ) : ?>
			<!--Wigitized 'Alert' for the home page -->
		<?php endif ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post-single">
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
				<div class="post-content">
					<?php the_content(__('Read more', 'whiteboard'));?>
				</div>
				<div class="post-meta">
					<p>
						<?php
              $date = get_the_time(__('F j, Y', 'whiteboard'));
              $time = get_the_time();
              $authorlink = get_the_author_posts_link();
              printf(__('Written on %1$s at %2$s, by %3$s', 'whiteboard'), $date, $time, $authorlink);
            ?>
					</p>
					<p>
						<?php comments_popup_link(__('No Comments', 'whiteboard'), __('1 Comment', 'whiteboard'),  __('% Comments', 'whiteboard')); ?>
						<br />
						<?php _e('Categories:', 'whiteboard') ?> <?php the_category(', ') ?>
						<br />
						<?php if (the_tags(__('Tags: ', 'whiteboard'), ', ', ' ')); ?>
					</p>
				</div><!--.postMeta-->
			</div><!--.post-single-->
		<?php endwhile; else: ?>
			<div class="no-results">
        <p><strong><?php _e('There has been an error.', 'whiteboard') ?></strong></p>

        <p><?php printf(__('We apologize for any inconvenience, please <a href="%1$s/" title="%2$s">return to the home page</a> or use the search form below.', 'whiteboard'), bloginfo('url'), bloginfo('description')); ?></p>

				<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
			</div><!--noResults-->
		<?php endif; ?>
			
		<nav class="oldernewer">
			<div class="older">
				<p>
					<?php next_posts_link(__('&laquo; Older Entries', 'whiteboard')) ?>
				</p>
			</div><!--.older-->
			<div class="newer">
				<p>
					<?php previous_posts_link(__('Newer Entries &raquo;', 'whiteboard')) ?>
				</p>
			</div><!--.older-->
		</nav><!--.oldernewer-->

	</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
