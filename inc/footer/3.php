<footer class="footer style_3">
  <div class="top_bar">
      <div class="container">
          <div class="row">
              <div class="col-sm-6 col-xs-12">
                  <?php
                    global $terme_options;
                   if($terme_options['Social_icon_footer']) { ?>
                <div class="social_menu">
                  <ul>
                    <?php if (isset($terme_options['facebook']) & !empty($terme_options['facebook'])) : ?>
                    <li><a href="<?php echo $terme_options['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if (isset($terme_options['twitter']) & !empty($terme_options['twitter'])) : ?>
                    <li><a href="<?php echo $terme_options['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if (isset($terme_options['google_plus']) & !empty($terme_options['google_plus'])) : ?>
                    <li><a href="<?php echo $terme_options['google_plus']; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if (isset($terme_options['vimeo']) & !empty($terme_options['vimeo'])) : ?>
                    <li><a href="<?php echo $terme_options['vimeo']; ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if (isset($terme_options['dribbble']) & !empty($terme_options['dribbble'])) : ?>
                    <li><a href="<?php echo $terme_options['dribbble']; ?>"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if (isset($terme_options['instagram']) & !empty($terme_options['instagram'])) : ?>
                    <li><a href="<?php echo $terme_options['instagram']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if (isset($terme_options['rss']) & !empty($terme_options['rss'])) : ?>
                    <li><a href="<?php echo $terme_options['rss']; ?>"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if (isset($terme_options['youtube']) & !empty($terme_options['youtube'])) : ?>
                    <li><a href="<?php echo $terme_options['youtube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                  </ul>
                </div><!-- social_menu -->
                <?php } ?>
              </div><!-- col-xs-6 -->
                <div class="col-sm-6 hidden-xs">
                  <div class="email_contact">
                    <p><?php echo $terme_options['email_footer']; ?></p>
                  </div>
              </div><!-- col-xs-6 -->
          </div><!-- row -->
      </div>	<!-- contanier -->
  </div><!-- top_bar -->
  <div class="bottom_bar">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="menu_area">
            <?php
              if (has_nav_menu('footer_menu')) {
                wp_nav_menu( array(
                  'theme_location' => 'footer_menu',
                  'container' => false
                ) );
              }?>
            <?php if($terme_options['copyright-footer']) { ?>
              <p>
                <?php echo $terme_options['footer-text']; ?>
              </p>
            <?php } ?>
          </div>
        </div><!-- col-xs-12 -->
      </div><!-- row -->
    </div><!-- contanier -->
  </div>	<!-- bottom_bar -->

</footer>
