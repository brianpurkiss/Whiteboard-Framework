<?php get_header(); ?>
<div id="content">

	<h1>
		<?php if ( is_day() ) : /* if the daily archive is loaded */ ?>
			<?php printf( __( 'Daily Archives: <span>%s</span>', 'whiteboard' ), get_the_date() ); ?>
		<?php elseif ( is_month() ) : /* if the montly archive is loaded */ ?>
			<?php printf( __( 'Monthly Archives: <span>%s</span>', 'whiteboard'), get_the_date('F Y') ); ?>
		<?php elseif ( is_year() ) : /* if the yearly archive is loaded */ ?>
			<?php printf( __( 'Yearly Archives: <span>%s</span>', 'whiteboard' ), get_the_date('Y') ); ?>
		<?php else : /* if anything else is loaded, ex. if the tags or categories template is missing this page will load */ ?>
			<?php _e('Blog Archives', 'whiteboard') ?>
		<?php endif; ?>
	</h1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post-single">
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
			<p>
        <?php
          $date = get_the_time(__('F j, Y', 'whiteboard'));
          $time = get_the_time();
          $authorlink = get_the_author_posts_link();
          printf(__('Written on %1$s at %2$s, by %3$s', 'whiteboard'), $date, $time, $authorlink);
        ?>
			</p>
			<div class="post-excerpt">
				<?php the_excerpt(); /* the excerpt is loaded to help avoid duplicate content issues */ ?>
			</div>
			
			<div class="post-meta">
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
