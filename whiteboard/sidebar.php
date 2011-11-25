<div id="sidebar">
	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>

		<li id="sidebar-search" class="widget">
			<h3><?php _e('Search', 'whiteboard'); ?></h3>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</li>
		
		<li id="sidebar-nav" class="widget menu">
			<h3><?php _e('Navigation', 'whiteboard'); ?></h3>
			<ul>
				<?php wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); /* editable within the Wordpress backend */ ?>
			</ul>
		</li>
		
		<li id="sidebar-archives" class="widget">
			<h3><?php _e('Archives', 'whiteboard'); ?></h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</li>

		<li id="sidebar-meta" class="widget">
			<h3><?php _e('Meta', 'whiteboard'); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</li>

	<?php endif; ?>
</div><!--sidebar-->
