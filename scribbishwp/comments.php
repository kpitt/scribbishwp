<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

  if (!empty($post->post_password)) { // if there's a password
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

      <p class="nocomments">This post is password protected. Enter the password to view comments.<p>

<?php
      return;
    }
  }
?>

<!-- You can start editing here. -->

  <h5><a name="comments">Comments</a></h5> 
  <?php if ('open' == $post->comment_status) : ?> 
    <!-- If comments are open. -->
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
      <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to leave a response.</p>
    <?php else : ?>
      <p><a href="#commentform">Leave a response</a></p>
    <?php endif; ?>
		
	 <?php else : // comments are closed ?>
		<p class="nocomments">Comments are closed.</p>
		
	<?php endif; ?>

  <?php if ($comments) : ?>
    <div id="comments_div">
      <ol id="comments" class="comments">

      <?php foreach ($comments as $comment) : ?>

        <li class="comment" id="comment-<?php comment_ID() ?>">
          <div class="author">
            <cite><?php comment_author_link() ?></cite>
            <abbr title="<?php the_time('Y-m-d\TH:i:s') ?>"><?php comment_time('D, d M Y H:i:s T') ?></abbr>
            <?php if ($comment->comment_approved == '0') : ?>
            <em>Your comment is awaiting moderation.</em>
            <?php endif; ?>
            <small><?php edit_comment_link('edit','',''); ?></small>
          </div>

          <div class="content">
            <?php comment_text() ?>
          </div>

        </li>

      <?php endforeach; /* end for each comment */ ?>

      </ol>
    </div>

	<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<?php if (!( get_option('comment_registration') && !$user_ID )) : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" class="comments" id="commentform" method="post">

<fieldset>
  <legend>Comments</legend>
  <?php if ( $user_ID ) : ?>

    <p>
      Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.<br />
      <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a>
    </p>

  <?php else : ?>

    <p>
      <label>Name: <?php if ($req) echo "<small>(required)</small>"; ?><br />
        <input name="author" id="author" value="<?php echo $comment_author; ?>" size="30" type="text" tabindex="1" />
      </label>
    </p>

    <p>
      <label>Email: <?php if ($req) echo "<small>(required)</small>"; ?><br />
        <input name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" type="text" tabindex="2" />
        <small>(will not be published)</small>
      </label>
    </p>

    <p>
      <label>Url:<br />
        <input name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" type="text" tabindex="3" />
      </label>
    </p>

  <?php endif; ?>

  <!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

  <p>
    <label>
      Comments:<br />
      <textarea name="comment" id="comment" cols="100%" rows="20" tabindex="4"></textarea></p>

  <p>
    <input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
  </p>
  <?php do_action('comment_form', $post->ID); ?>
</fieldset>
</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
