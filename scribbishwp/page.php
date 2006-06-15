<?php get_header(); ?>

	<div id="content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="viewpage">
      <h1><?php the_title(); ?></h1>
        
			<?php the_content('<p>Continue reading...</p>'); ?>
	
			<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
		</div>
	  <?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>