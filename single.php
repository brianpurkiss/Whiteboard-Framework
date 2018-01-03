<?php get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="col-md-8">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('content/post'); ?>

				<div class="newer-older">
					<p class="older"><?php previous_post_link('%link', '&laquo; Previous post') ?>
					<p class="newer"><?php next_post_link('%link', 'Next Post &raquo;') ?></p>
				</div><!--.newer-older-->

				<?php comments_template( '', true ); ?>

			<?php endwhile; /* end loop */ ?>
		</div><?php // end .col-md-8 ?>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><?php // end .col-md-4 ?>
	</div><?php // end .row ?>
</div><?php // end #row .container ?>
<?php get_footer(); ?>
