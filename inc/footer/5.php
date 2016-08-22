<?php global $terme_options; ?>
<footer class="footer style_5">
  <div class="top_bar">
      <div class="container">
          <div class="row">
              <div class="col-xs-12">
                <div class="newsletter">
                    <span>Join to Terme Newsletter</span>
                    <form class="" action="index.html" method="post">
                      <input type="text" name="name" value="" placeholder="Enter your email ;)">
                      <button class="btn" type="submit" data-termehover="">Subscribe</button>

                    </form>
                </div>
              </div>
          </div>
      </div>
  </div>
  <div class="main_area">
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_1') ) : ?>
                <?php endif; ?>
              </div><!-- col-xs-4 -->
              <div class="col-md-4 col-sm-6 col-xs-12">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_2') ) : ?>
                <?php endif; ?>
              </div><!-- col-xs-4 -->
              <div class="col-md-4 hidden-sm hidden-xs">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_3') ) : ?>
                <?php endif; ?>
              </div><!-- col-xs-4 -->
          </div><!-- row -->
      </div>	<!-- contanier -->
  </div><!-- main_area -->
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
    }
?>
        <?php if($terme_options['copyright-footer']) { ?>
          <p>
            <?php echo $terme_options['footer-text']; ?>
          </p>
        <?php } ?>
        <?php if($terme_options['Social_icon_footer']) { ?>
              <div class="social_menu">
                <ul>
                  <li class="facebook"><a href="<?php echo $terme_options['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li class="twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li class="tumblr"><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                  <li class="vimeo"><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                  <li class="linkedin"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  <li class="dribbble"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                  <li class="instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  <li class="rss"><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                </ul>
              </div><!-- social_menu -->
        <?php } ?>
  </div>
</div><!-- col-xs-12 -->
      </div><!-- row -->
    </div><!-- contanier -->
  </div>	<!-- bottom_bar -->

</footer>
