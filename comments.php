  <?php
  /**
   * The template for displaying Comments.
   *
   * The area of the page that contains comments and the comment form.
   *
   * @since Twenty Thirteen 1.0
   */

  /*
   * If the current post is protected by a password and the visitor has not yet
   * entered the password we will return early without loading the comments.
   */
  if (post_password_required()) {
      return;
  }
  ?>
<?php if (have_comments() || comments_open()) : ?>
  <div class="article_comments">
      <h4><?php _e('Comments','terme') ?></h4>
      <div class="comment_container">
<?php endif; ?>
        <?php if (have_comments()) : ?>


            <ol class="comment-list">
                        <?php wp_list_comments('type=comment&avatar_size=80&callback=advanced_comment'); ?>
            </ol><!-- .comment-list -->
          <?php
            // Are there comments to navigate through?
            if (get_comment_pages_count() > 1 && get_option('page_comments')) :
          ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'terme'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'terme')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'terme')); ?></div>
            </nav><!-- .comment-navigation -->
          <?php endif; // Check for comment navigation ?>
          <?php if (!comments_open() && get_comments_number()) : ?>
                <p class="no-comments"><?php _e('Comments are closed.', 'terme'); ?></p>
          <?php endif; ?>
        <?php endif; // have_comments() ?>
        <?php if (comments_open()) : ?>
            <?php
                $args = array(
                    'id_form' => 'commentform',
                    'id_submit' => 'submit',
                    'class_submit' => 'btn btn-success has_icon',
                    'title_reply' => '<h4>'.__( 'Your Comment', 'terme' ).'</h4>',
                    'title_reply_to' => __('Leave a Reply to %s', 'terme'),
                    'cancel_reply_link' => __('Cancel Reply', 'terme'),
                    'label_submit' => __('Post Comment', 'terme'),
                    'comment_field' => '<p class="comment-form-comment">'.
                    '<textarea id="comment" placeholder="' . __('Your Comment', 'terme' ) . '" name="comment" cols="58" rows="3" aria-required="true">'.
                    '</textarea></p>',
                    'must_log_in' => '<p class="must-log-in">'.
                    sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'terme' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ).'</p>',
                    'logged_in_as' => '<p class="logged-in-as">'.
                    sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'terme' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ).'</p>',
                    'comment_notes_before' => '',
                    'comment_notes_after' => '',
                    'fields' => apply_filters('comment_form_default_fields', array(
                        'author' => '<div class="comment-form-author">'.'<input id="author" placeholder="' . __('Name', 'terme' ) . '" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30"/></div>',
                        'email' => '<div class="comment-form-email">'.'<input id="email" name="email" placeholder="' . __('Email', 'terme' ) . '" type="text" value="'.esc_attr($commenter['comment_author_email']).'" size="30"/></div>',
                        )
                    ),
                );
                comment_form($args, get_the_ID());
          ?>
      <?php endif; ?>
<?php if (have_comments() || comments_open()) : ?>
    </div>
</div>
<?php endif; ?>
