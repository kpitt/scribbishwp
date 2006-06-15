<?php get_header(); ?>

	<div id="content">

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		  <div class="atomentry" id="article-<?php the_ID(); ?>">
				<h2 class="title">
          <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>

        <p class="author">
				  Posted by <cite><?php the_author() ?></cite> on
          <abbr class="published" title="<?php the_time('Y-m-d\TH:i:s') ?>"><span class="posted_date" title="<?php the_time('D, d M Y H:i:s T') ?>"><?php the_time('F d, Y') ?></span></abbr>
        </p>
				
				<div class="content">
					<?php the_content('Continue reading...'); ?>
				</div>
		
				<ul class="meta">
          <li class="categories">Posted in <?php the_category(', ') ?></li>
          <li>Meta
            <?php comments_popup_link('no comments', '1 comment', '% comments'); ?>,
            <a href="<?php the_permalink() ?>" rel="bookmark">permalink</a>,
            <?php comments_rss_link('rss'); ?>
          </li>
        </ul>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
