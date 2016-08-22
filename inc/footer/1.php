<footer class="footer style_1">
  <div class="main_area">
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-xs-12">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_1') ) : ?>
                <?php endif; ?>
                <div class="box_1">

                    <?php if($terme_options['Social_icon_footer']) { ?>
                  <ul>
                    <li><a href="<?php echo $terme_options['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                  </ul>
                  <?php } ?>

                </div><!-- box_1 -->
              </div><!-- col-xs-4 -->
              <div class="col-md-4 col-sm-6 hidden-xs">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_2') ) : ?>
                <?php endif; ?>
              </div><!-- col-xs-4 -->
              <div class="col-md-4 col-sm-6">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_3') ) : ?>
                <?php endif; ?>
                <div class="box_3">
                  <div class="newsletter">
                      <h2>Terme Newsletter</h2>
                      <form class="" action="index.html" method="post">
                        <input type="text" name="name" value="" placeholder="Enter your email ;)">
                        <button class="btn" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                      </form>
                  </div>
                </div><!-- box_3 -->
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
  </div>
</div><!-- col-xs-12 -->
      </div><!-- row -->
    </div><!-- contanier -->
  </div>	<!-- bottom_bar -->

</footer>
