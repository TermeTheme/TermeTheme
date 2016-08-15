<?php global $terme_options; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <title>
  <?php
      if (is_single()) {
        wp_title().bloginfo('name');
      } else {
        bloginfo('name');
      }
     ?>
   </title>
	<?php if ( isset($terme_options['favicon_57']['url']) && !empty ($terme_options['favicon_57']['url'])) { ?>
		<link rel="shortcut icon" href="<?php echo $terme_options['favicon_57']['url']; ?>" />
	<?php } elseif (isset($terme_options['favicon_72']['url']) && !empty ($terme_options['favicon_72']['url'])) { ?>
		<link rel="shortcut icon" href="<?php echo $terme_options['favicon_57']['url']; ?>" />
	<?php } elseif (isset($terme_options['favicon_114']['url']) && !empty ($terme_options['favicon_114']['url'])) { ?>
		<link rel="shortcut icon" href="<?php echo $terme_options['favicon_114']['url']; ?>" />
	<?php } elseif (isset($terme_options['favicon_144']['url']) && !empty ($terme_options['favicon_144']['url'])) { ?>
		<link rel="shortcut icon" href="<?php echo $terme_options['favicon_144']['url']; ?>" />
	<?php } else { ?>
		<link rel="shortcut icon" href="<?php echo $terme_options['favicon_16']['url']; ?>" />
	<?php }  ?>
  <?php load_theme_textdomain('terme'); ?>
  <?php if ( get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php include TEMPLATEPATH . '/style.php'; ?>
  <?php echo $terme_options['google_analytics_code']; ?>
  <?php echo $terme_options['code_before_head']; ?>
	<?php echo $terme_options['header-script']; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class($terme_options['custom_body_class']); ?>>
  	<div id="sb-site">
		<?php if ($terme_options['header_layout'] == '1') {
			include TEMPLATEPATH . '/inc/header/1.php';
		}elseif ($terme_options['header_layout'] == '2') {
			include TEMPLATEPATH . '/inc/header/2.php';
		}elseif ($terme_options['header_layout'] == '3') {
			include TEMPLATEPATH . '/inc/header/3.php';
		}else {
			include TEMPLATEPATH . '/inc/header/4.php';
		}
		?>
