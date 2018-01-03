<?php get_header(); ?>
<div id="content" class="container">
	<div class="row">
		<div class="col-md-8">

			<h1>
				<?php if ( is_day() ) : /* if the daily archive is loaded */ ?>
					<?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : /* if the montly archive is loaded */ ?>
					<?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date('F Y') ); ?>
				<?php elseif ( is_year() ) : /* if the yearly archive is loaded */ ?>
					<?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date('Y') ); ?>
				<?php else : /* if anything else is loaded, ex. if the tags or categories template is missing this page will load */ ?>
					Blog Archives
				<?php endif; ?>
			</h1>

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
