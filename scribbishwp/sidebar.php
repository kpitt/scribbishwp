	<div id="sidebar">
    <ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
      <!-- search -->
      <li id="search" class="search">
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
      </li>

      <!-- sidebar components -->
      <!-- Author information is disabled by default. Uncomment and fill in your details if you want to use it.
      <li id="author"><h2 class="sidebar-title">Author</h2>
      <p>A little something about you, the author. Nothing lengthy, just an overview.</p>
      </li>
      -->

      <li id="archives">
      <?php /* If this is a 404 page */ if (is_404()) { ?>
      <?php /* If this is a category archive */ } elseif (is_category()) { ?>
      <p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
      
      <?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
      <p>You are currently browsing the archives for the day <?php the_time('l, F d, Y'); ?>.</p>
      
      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <p>You are currently browsing the archives for <?php the_time('F, Y'); ?>.</p>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <p>You are currently browsing the archives for the year <?php the_time('Y'); ?>.</p>
      
     <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
      <p>You have searched the archives for <strong>'<?php echo wp_specialchars($s); ?>'</strong>.
         If you are unable to find anything in these search results, you can try one of these links.</p>

      <?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> archives.</p>

      <?php } ?>
      </li>

      <?php wp_list_pages('title_li=<h2 class="sidebar-title">Pages</h2>' ); ?>

      <li id="categories"><h2 class="sidebar-title">Categories</h2>
        <ul>
        <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
        </ul>
      </li>

      <li id="syndicate"><h2 class="sidebar-title">Syndicate</h2>
        <ul>
          <li><a href="feed:<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed">Articles</a></li>
          <li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="Comments RSS 2.0 feed">Comments</a></li>
        </ul>
      </li>

      <li id="archives"><h2 class="sidebar-title">Archives</h2>
        <ul>
        <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </li>

      <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>				
        <?php get_links_list(); ?>
        
        <li id="meta"><h2 class="sidebar-title">Meta</h2>
        <ul>
          <?php wp_register(); ?>
          <li><?php wp_loginout(); ?></li>
          <?php wp_meta(); ?>
        </ul>
        </li>
      <?php } ?>
<?php endif; ?>

    </ul>
	</div>

