	<div class="clear"></div>
	</div><!--.container-->
	<div id="footer"><footer>
		<div class="container">
			<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?><!--Wigitized Footer--><?php endif ?>
			<div id="nav-footer" class="nav"><nav>
				<?php wp_nav_menu( array('theme_location' => 'footer-menu' )); /* editable within the Wordpress backend */ ?>
			</nav></div><!--#nav-footer-->
			<p class="clear"><a href="#main"><?php _e('Top'); ?></a></p>
			<p><a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow"><?php _e('Entries (RSS)'); ?></a> | <a href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow"><?php _e('Comments (RSS)'); ?></a></p>
			<p>&copy; <?php echo date("Y") ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>. <?php _e('All Rights Reserved.'); ?></p>
			<p><?php _e('Built on the'); ?> <a href="http://whiteboardframework.com/">Whiteboard Framework for Wordpress</a> <span class="amp">&amp;</span> <a href="http://lessframework.com">Less Framework</a>. <?php _e('Powered by'); ?> <a href="http://wordpress.org">Wordpress</a>.</p><?php /* Whiteboard Framework is free to use. You are only required to keep a link in the CSS. We do not require a link on the site, though we do greatly appreciate it. Likewise, Less Framework is free to use. Links are not required on the website or in the CSS but are greatly appreciated. */ ?>
		</div><!--.container-->
	</footer></div><!--#footer-->
</div><!--#main-->
<?php wp_footer(); /* this is used by many Wordpress features and plugins to work proporly */ ?>
</body>
</html>