<?php get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="col-md-8">

			<h1><?php the_search_query(); ?></h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-single">
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
					<p><?php _e('Written on '); the_time('F j, Y'); _e(' at '); the_time(); _e(', by ');  the_author_posts_link() ?></p>

					<div class="post-excerpt">
						<?php the_excerpt(); /* the excerpt is loaded to help avoid duplicate content issues */ ?>
					</div><!--.post-excerpt-->
				</div><!--.post-single-->
			<?php endwhile; else: ?>
				<div class="no-results">
					<h2><?php _e('No Results'); ?></h2>
					<p><?php _e('Please feel free try again!'); ?></p>
					<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
				</div><!--no-results-->
			<?php endif; ?>

			<?php get_template_part('modules/older-newer'); ?>

		</div><?php // end .col-md-8 ?>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><?php // end .col-md-4 ?>
	</div><?php // end .row ?>
</div><?php // end #row .container ?>
<?php get_footer(); ?>
