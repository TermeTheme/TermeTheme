<footer class="footer style_3">
  <div class="top_bar">
      <div class="container">
          <div class="row">


              <div class="col-sm-6 col-xs-12">
                  <?php if($terme_options['social-footer']) { ?>
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
                
              </div><!-- col-xs-6 -->

                <div class="col-sm-6 hidden-xs">
                  <div class="email_contact">
                    <p>info@yourdomain.com - sale@yourdomain.com</p>

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
