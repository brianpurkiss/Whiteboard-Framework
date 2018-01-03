<?php get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="col-md-8">
			<h1><?php the_search_query(); ?></h1>
			<?php get_search_form(); // outputs the default Wordpress search form ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('content/post'); ?>
			<?php endwhile; else: ?>
				<?php get_template_part('modules/no-results'); ?>
			<?php endif; ?>

			<?php get_template_part('modules/older-newer'); ?>

		</div><?php // end .col-md-8 ?>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><?php // end .col-md-4 ?>
	</div><?php // end .row ?>
</div><?php // end #row .container ?>
<?php get_footer(); ?>
