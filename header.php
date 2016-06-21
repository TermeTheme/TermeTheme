<?php global $terme_options; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Home</title>
	<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css"> -->
	<!-- <link rel="stylesheet" href="assets/css/font-awesome.min.css"> -->
	<!-- <link rel="stylesheet" href="assets/css/owl.carousel.css"> -->
	<!-- <link rel="stylesheet" href="assets/css/slidebars.min.css"> -->
	<!-- <link rel="stylesheet" href="assets/css/terme.css"> -->
	<?php if ($terme_options['custom_favicon']['url'] != '') { ?>
	<link rel="shortcut icon" href="<?php echo $terme_options['custom_favicon']['url']; ?>" />
	<?php } ?>
	<?php if ($terme_options['apple_favicon']['url'] != '') { ?>
	<link rel="shortcut icon" href="<?php echo $terme_options['apple_favicon']['url']; ?>" />
	<?php } ?>
	<?php echo $terme_options['header-script']; ?>
  <?php wp_head(); ?>
</head>
<body>
	<div id="sb-site">
