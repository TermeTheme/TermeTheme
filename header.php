<?php global $terme_options; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Home</title>
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
	<?php echo $terme_options['header-script']; ?>
  <?php wp_head(); ?>
</head>
<body>
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
