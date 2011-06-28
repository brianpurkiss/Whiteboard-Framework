<?php get_header(); ?>
<div id="content">

	<h1><?php printf( __( 'Tag Archives: %s' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
	<?php echo tag_description(); /* displays the tag's description from the Wordpress admin */ ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post-single">
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
			<div class="post-excerpt">
				<?php the_excerpt(); /* the excerpt is loaded to help avoid duplicate content issues */ ?>
			</div>
	
			<div class="post-meta">
				<p>
					Written on <?php the_time('F j, Y'); ?> at <?php the_time() ?>, by <?php the_author_posts_link() ?>
				</p>
				<p>
					<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
					<br />
					Categories: <?php the_category(', ') ?>
					<br />
					<?php if (the_tags('Tags: ', ', ', ' ')); ?>
				</p>
			</div><!--.postMeta-->
		</div><!--.1`post-single-->
	<?php endwhile; else: ?>
		<div class="no-results">
			<p><strong>There has been an error.</strong></p>
			<p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
			<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		</div><!--noResults-->
	<?php endif; ?>
		
	<nav class="oldernewer">
		<div class="older">
			<p>
				<?php next_posts_link('&laquo; Older Entries') ?>
			</p>
		</div><!--.older-->
		<div class="newer">
			<p>
				<?php previous_posts_link('Newer Entries &raquo;') ?>
			</p>
		</div><!--.older-->
	</nav><!--.oldernewer-->
	
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>