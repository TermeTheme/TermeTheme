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
                <div class="box_1">
                  <h2>Popular News</h2>
                  <ul>
                    <li>
                      <div class="thumb"><img src="assets/img/top_new_01.jpg" height="75" width="100" alt=""></div>
                      <h3><a href="">Google Ranked As The World's</a></h3>
                      <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
                    </li>
                    <li>
                      <div class="thumb"><img src="assets/img/top_new_02.jpg" height="75" width="100" alt=""></div>
                      <h3><a href="">2016 Mac Pro release date rumours & specs</a></h3>
                      <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
                    </li>
                  </ul>
                </div><!-- box_1 -->
              </div><!-- col-xs-4 -->
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="box_2">
                  <h2>Top News</h2>
                  <ul>
                    <li>
                      <div class="thumb"><img src="assets/img/top_new_01.jpg" height="75" width="100" alt=""></div>
                      <h3><a href="">Google Ranked As The World's</a></h3>
                      <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
                    </li>
                    <li>
                      <div class="thumb"><img src="assets/img/top_new_02.jpg" height="75" width="100" alt=""></div>
                      <h3><a href="">2016 Mac Pro release date rumours & specs</a></h3>
                      <div class="time"><i class="fa fa-clock-o"></i> Friday, 27 April 2016</div>
                    </li>
                  </ul>
                </div><!-- box_2 -->
              </div><!-- col-xs-4 -->
              <div class="col-md-4 hidden-sm hidden-xs">
                <div class="box_3">
                  <div class="popular_tags">
                      <h2>Popular Tags</h2>
                      <div class="tagcloud">
                        <a href="#" data-termehover="">Sports</a>
                        <a href="#" data-termehover="">best offer</a>
                        <a href="#">terme</a>
                        <a href="#">game</a>
                        <a href="#">Sports</a>
                        <a href="#">Logic</a>
                        <a href="#">politics</a>
                        <a href="#">Logic</a>
                        <a href="#">terme</a>
                        <a href="#">goverments</a>
                        <a href="#">hamyarwp</a>
                        <a href="#">imojtaba</a>
                      </div>
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
        <?php if($terme_options['social-footer']) { ?>
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
