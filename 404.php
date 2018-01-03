<?php get_header(); ?>
<div id="content" class="container">
	<div id="error404" class="row">
		<div class="col-md-8">
			<h1><?php _e('Error 404 Not Found'); ?></h1>
			<?php get_template_part('modules/no-results'); ?>
		</div><?php // end #error404 .post ?>
	</div><?php // end .col-md-8 ?>
	<div class="col-md-4">
		<?php get_sidebar(); ?>
	</div><?php // end .col-md-4 ?>
</div><?php // end #content ?>
<?php get_footer(); ?>
