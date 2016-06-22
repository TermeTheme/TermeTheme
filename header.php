<?php global $terme_options; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <?php if ( get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php if ($terme_options['custom_favicon']['url'] != '') { ?>
	<link rel="shortcut icon" href="<?php echo $terme_options['custom_favicon']['url']; ?>" />
	<?php } ?>
	<?php if ($terme_options['apple_favicon']['url'] != '') { ?>
	<link rel="shortcut icon" href="<?php echo $terme_options['apple_favicon']['url']; ?>" />
	<?php } ?>
	<?php echo $terme_options['header-script']; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
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
