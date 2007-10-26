<?php get_header(); ?>

	<div id="content">
				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!--
    <?php trackback_rdf(); ?>
    -->
    
		<div class="hentry" id="article-<?php the_ID(); ?>">
			<h2 class="entry-title">
        <?php the_title(); ?>
        <?php the_comment_count_elem(); ?>
      </h2>

      <div class="posted">
        <span class="vcard">
          Posted by <span class="fn"><?php the_author() ?></span>
        </span>
        <abbr class="published" title="<?php the_time_xml() ?>"><span class="posted_date" title="<?php the_time('D, d M Y H:i:s T') ?>">on <?php the_time('F d, Y') ?></span></abbr>
      </div>
      <br class="clear" />	
			<div class="entry-content">
				<?php the_content('<p class="serif">Continue reading...</p>'); ?>
	
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
			</div>
      <ul class="meta">
        <li class="categories">Posted in <?php the_category(', ') ?></li>
        <li>Meta
          <a href="#comments"><?php comments_number('no comments', '1 comment', '% comments'); ?></a>,
          <a href="<?php the_permalink() ?>" rel="bookmark">permalink</a>,
          <?php comments_rss_link('rss'); ?>
        </li>
      </ul>
		</div>
		
  <h5><a name="trackbacks">Trackbacks</a></h5>
  <?php if ('open' == $post->ping_status) : ?> 
    <!-- If trackbacks are open. -->
    <p>
      Use <a href="<?php trackback_url(true); ?>" rel="trackback">this link</a> to trackback from your own site.
    </p>    
	 <?php else : // trackbacks are closed ?>
		<p class="nopings">Trackbacks are closed.</p>
		
	<?php endif; ?>

	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
	
<?php endif; ?>
	
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
