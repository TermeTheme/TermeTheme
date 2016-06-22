<footer class="footer style_4">
  <div class="main_area">
      <div class="container">
          <div class="row">
              <div class="col-xs-4 col-xs-offset-4">
                <div class="box_1">
                  <img src="" width="150" height="100" alt="" />
                  <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat ut laoreet dolore magna aliquam erat volutpat ut laoreet dolore magna aliquam erat volutpat.
                  </p>
                </div><!-- box_1 -->
              </div><!-- col-xs-3 -->



              <div class="col-xs-12">
                <?php if($terme_options['Social_icon_footer']) { ?>
                <div class="social_menu">
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
                </div><!-- social_menu -->
                <?php } ?>
              </div><!-- col-xs-12 -->
          </div><!-- row -->
      </div>	<!-- contanier -->
  </div><!-- main_area -->
  <div class="bottom_bar">
    <div class="container">
      <div class="row">
<div class="col-xs-12">
  <div class="menu_area">
    <ul>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Terme Achievements</a></li>
      <li><a href="#">Opportunity</a></li>
      <li><a href="#">Terms of Use</a></li>
      <li><a href="#">Privacy</a></li>
    </ul>
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
