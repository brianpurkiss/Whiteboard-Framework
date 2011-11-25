<?php get_header(); ?>
<div id="content" class="search">

	<h1><?php the_search_query(); ?></h1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post-single">
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
        <?php
          $date = get_the_time(__('F j, Y', 'whiteboard'));
          $time = get_the_time();
          $authorlink = get_the_author_posts_link();
          printf(__('Written on %1$s at %2$s, by %3$s', 'whiteboard'), $date, $time, $authorlink);
        ?>
	
			<div class="post-excerpt">
				<?php the_excerpt(); /* the excerpt is loaded to help avoid duplicate content issues */ ?>
			</div><!--.post-excerpt-->
		</div><!--.post-single-->
	<?php endwhile; else: ?>
		<div class="no-results">
			<h2><?php _e('No Results', ''); ?></h2>
			<p><?php _e('Please feel free try again!', ''); ?></p>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</div><!--no-results-->
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
	
</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
