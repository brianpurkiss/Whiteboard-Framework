<?php get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div id="content" class="col-md-8">
			<?php if ( ! dynamic_sidebar( 'Alert' ) ) :
				// Wigitized 'Alert' for the home page
			endif ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('content/post'); ?>
			<?php endwhile; else: ?>
				<div class="no-results">
					<p><strong><?php _e('There has been an error.'); ?></strong></p>
					<p><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.'); ?></p>
					<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
				</div><?php // end noResults ?>
			<?php endif; ?>

			<?php get_template_part('modules/older-newer'); ?>

		</div><?php // end #content .col-md-8 ?>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><?php // end .col-md-4 ?>
	</div><?php // end .row ?>
</div><?php // end .container ?>
<?php get_footer(); ?>
