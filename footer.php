	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col">
					<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?><!--Wigitized Footer--><?php endif ?>
					<nav id="nav-footer" class="nav">
						<?php wp_nav_menu( array('theme_location' => 'footer-menu' )); /* editable within the Wordpress backend */ ?>
					</nav>

					<p><a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow"><?php _e('Entries (RSS)'); ?></a> | <a href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow"><?php _e('Comments (RSS)'); ?></a></p>
					<p>&copy; <?php echo date("Y") ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>. <?php _e('All Rights Reserved.'); ?></p>

					<p><?php _e('Built on the'); ?> <a href="http://whiteboardframework.com/">Whiteboard Framework for Wordpress</a>, <?php _e('Powered by'); ?> <a href="http://wordpress.org">Wordpress</a>.</p>
					<?php /* Whiteboard Framework is free to use. You are only required to keep a link in the CSS. We do not require a link on the site, though we do greatly appreciate it. Likewise, Less Framework is free to use. Links are not required on the website or in the CSS but are greatly appreciated. */ ?>
					<p><a href="#main"><?php _e('Top'); ?></a></p>
				</div>
			</div>
		</div><!--.container-->
	</footer><!--#footer-->
</div><?php // end #main - opened in the header ?>
<?php wp_footer(); /* this is used by many Wordpress features and plugins to work proporly */ ?>
</body>
</html>
