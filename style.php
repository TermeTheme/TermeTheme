<?php global $terme_options; ?>
<style type="text/css">
  <?php echo $terme_options['custom_css_style']; ?>
  @media (min-width: 1200px) {
    <?php echo $terme_options['large_desktop']; ?>
  }
  @media (min-width: 992px) {
    <?php echo $terme_options['desktop']; ?>
  }
  @media (min-width: 768px) {
    <?php echo $terme_options['tablet']; ?>
  }
  @media (max-width: 768px) {
    <?php echo $terme_options['mobile']; ?>
  }
</style>
