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
    <?php if (have_comments()) : ?>

        <h4>User Comments</h4>
        <ol class="comment-list">
                    <?php wp_list_comments('type=comment&avatar_size=80&callback=advanced_comment'); ?>
        </ol><!-- .comment-list -->

      <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
      ?>
      <nav class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'twentythirteen'); ?></h1>
        <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'twentythirteen')); ?></div>
        <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'twentythirteen')); ?></div>
      </nav><!-- .comment-navigation -->
      <?php endif; // Check for comment navigation ?>
      <?php if (!comments_open() && get_comments_number()) : ?>
          <div class="commentForm">
            <h5>دیدگاه خود را بیان کنید</h5>
            <p class="no-comments"><?php _e('Comments are closed.', 'twentythirteen'); ?></p>
          </div>

      <?php endif; ?>
    <?php endif; // have_comments() ?>
    <?php if (comments_open()) : ?>
            <h4>Your Comment</h4>
    <?php
    $args = array(
    'id_form' => 'commentform',
    'id_submit' => 'submit',
    'class_submit' => 'btn btn-success has_icon',
    'title_reply' => __(''),
    'title_reply_to' => __('ارسال پاسخ به %s'),
    'cancel_reply_link' => __('لغو پاسخ'),
    'label_submit' => __('Post Comment'),

    'comment_field' => '<p class="comment-form-comment">'.
    // '<label for="comment">' . _x( 'دیدگاه', 'noun' ) . '</label>' .
      '<textarea id="comment" placeholder="Comment" name="comment" cols="58" rows="3" aria-required="true">'.
      '</textarea></p>',

    'must_log_in' => '<p class="must-log-in">'.
      sprintf(
        __('برای ارسال دیدگاه در همیار وردپرس یا باید <a  href="#" class="popup-login">وارد شوید</a> یا <a href="#" class="popup-register">عضو شوید.</a>'),
        wp_login_url(apply_filters('the_permalink', get_permalink()))
      ).'</p>',

    'logged_in_as' => '<p class="logged-in-as">'.
      sprintf(
      __('شما با حساب کاربری  <a href="%1$s">%2$s</a> وارد شده‌اید. <a href="%3$s" title="خروج از این حساب کاربری ">خارج می‌شوید؟</a>'),
        admin_url('profile.php'),
        $user_identity,
        wp_logout_url(apply_filters('the_permalink', get_permalink()))
      ).'</p>',

    'comment_notes_before' => '',

    'comment_notes_after' => '',

    'fields' => apply_filters('comment_form_default_fields', array(

      'author' => '<div class="comment-form-author">'.
        // '<label for="author">' . __( 'نام', 'domainreference' ) . '</label> ' .
        // ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="author" placeholder="Name" name="author" type="text" value="'.esc_attr($commenter['comment_author']).
        '" size="30"/></div>',

      'email' => '<div class="comment-form-email">'.
        // '<label for="email">' . __( 'ایمیل', 'domainreference' ) . '</label> '.
        // ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="email" name="email" placeholder="Email" type="text" value="'.esc_attr($commenter['comment_author_email']).
        '" size="30"/></div>',

      // 'url' =>
        // '<div class="comment-form-url">' .
        // '<label for="url">'. __( 'وبسایت', 'domainreference' ) . '</label>' .
        // '<input id="url" name="url" placeholder="وبسایت" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
        // '" size="30" /></div>'
      )
    ),
  );
  comment_form($args, get_the_ID());
  ?>

  <?php endif; ?>
