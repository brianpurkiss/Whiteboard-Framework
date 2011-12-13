<?php get_header(); ?>
<div id="content">
	<div id="error404" class="post">
		<h1><?php _e('Error 404 Not Found'); ?></h1>
		<div class="post-content">
			<p><?php _e('Oops. Fail. The page cannot be found.'); ?></p>
			<p><?php _e('Please check your URL or use the search form below.'); ?></p>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</div><!--.post-content-->
	</div><!--#error404 .post-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>