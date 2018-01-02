<?php get_header(); ?>
<div id="content" class="container">
	<div id="error404" class="row">
		<div class="col-md-8">
			<h1><?php _e('Error 404 Not Found'); ?></h1>
			<div class="post-content">
				<p><?php _e('Oops. Fail. The page cannot be found.'); ?></p>
				<p><?php _e('Please check your URL or use the search form below.'); ?></p>
				<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
			</div><!--.post-content-->
		</div><!--#error404 .post-->
	</div>
	<div class="col-md-4">
		<?php get_sidebar(); ?>
	</div>
</div><!--#content-->
<?php get_footer(); ?>
