<footer class="footer style_4">
  <div class="main_area">
      <div class="container">
          <div class="row">
              <div class="col-xs-4 col-xs-offset-4">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_1') ) : ?>
                <?php endif; ?>
              </div><!-- col-xs-3 -->
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
