<?php

##### Utility Functions #####

function the_time_xml( $gmt = true ) {
  global $post;
  if ( $gmt ) {
    $time = $post->post_date_gmt;
    $tz = 'Z';
  } else {
    $time = $post->post_date;
    # create ISO8601 tz offset manually because PHP 4 doesn't have a format
    # character for it
    $tz_offset = mysql2date('O', $time);  # always has the format '+hhmm'
    $tz_hours = substr($tz_offset, 0, 3);
    $tz_mins = substr($tz_offset, 3, 2);
    $tz = $tz_hours . ':' . $tz_mins;
  }

  $time = mysql2date('Y-m-d\TH:i:s', $time);
  echo $time . $tz;
}

function the_comment_count_elem() {
  global $post;

  if ( ! isset($post->comment_count) )
    $count = 0;
  else
    $count = $post->comment_count;

  if ( $count > 0 )
    echo '<span class="comment_count">' . $count . '</span>';
}

if ( function_exists('register_sidebars') )
	register_sidebar();

function widget_scribbishwp_syndicate() {
?>
  <li id="syndicate"><h2 class="sidebar-title">Syndicate</h2>
    <ul>
      <li><a href="feed:<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed">Articles</a></li>
      <li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="Comments RSS 2.0 feed">Comments</a></li>
    </ul>
  </li>
<?php
}

##### Widget Sidebar Functions #####

function widget_scribbishwp_meta($args) {
	extract($args);
	$options = get_option('widget_meta');
	$feeds = $options['feeds'];
	$title = empty($options['title']) ? __('Meta') : $options['title'];
?>
  <li id="meta"><h2 class="sidebar-title"><?php echo $title ?></h2>
    <ul>
      <?php wp_register(); ?>
      <li><?php wp_loginout(); ?></li>
      <?php if ( $feeds ) { ?>
      <li><a href="feed:<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed">Articles Feed</a></li>
      <li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="Comments RSS 2.0 feed">Comments Feed</a></li>
      <?php } ?>
      <?php wp_meta(); ?>
    </ul>
  </li>
<?php
}
function widget_scribbishwp_meta_control() {
	$options = $newoptions = get_option('widget_meta');
	if ( $_POST["meta-submit"] ) {
		$newoptions['feeds'] = isset($_POST['meta-feeds']);
		$newoptions['title'] = strip_tags(stripslashes($_POST["meta-title"]));
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_meta', $options);
	}
	$feeds = $options['feeds'] ? 'checked="checked"' : '';
	$title = htmlspecialchars($options['title'], ENT_QUOTES);
?>
			<p><label for="meta-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="meta-title" name="meta-title" type="text" value="<?php echo $title; ?>" /></label></p>
			<p style="text-align:right;margin-right:40px;"><label for="meta-feeds"><?php _e('Show RSS feed links', 'widgets'); ?> <input class="checkbox" type="checkbox" <?php echo $feeds; ?> id="meta-feeds" name="meta-feeds" /></label></p>
			<input type="hidden" id="meta-submit" name="meta-submit" value="1" />
<?php
}

if ( function_exists('register_sidebar_widget') ) {
  register_sidebar_widget(__('Syndicate'), 'widget_scribbishwp_syndicate');
  register_sidebar_widget(array('Meta', 'widgets'), 'widget_scribbishwp_meta');
  register_widget_control(array('Meta', 'widgets'), 'widget_scribbishwp_meta_control', 300, 90);
}
?>
