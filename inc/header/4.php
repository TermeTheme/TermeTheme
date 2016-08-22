<?php global $terme_options; ?>


<header class="header style_4">
	<?php if ( $terme_options['hide_top_bar'] == '0' ) { ?>

	<div class="top_bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 hidden-xs">
					<div class="today">
						<i class="fa fa-calendar"></i>
						<?php the_time($terme_options['today_date_format']); ?>
					</div>
				</div><!-- col-md-6 -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="user_area">
						<a href="#">	<?php _e( 'Login','terme' ); ?></a>
						<span>	<?php _e( 'OR','terme' ); ?></span>
						<a href="#">	<?php _e( 'Register','terme' ); ?></a>
					</div><!-- login_area -->
				</div><!-- col-md-6 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- top_bar -->
	<?php } else { ?>
	<?php } ?>
	<div class="main_area">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="logo">
						<?php if($terme_options['logo_type'] == 'logo_image') { ?>
						<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $terme_options['logo_img']['url']; ?>" alt=""></a>
						<?php } else { ?>
							<h1><a href="<?php bloginfo('url'); ?>"><?php echo $terme_options['site_name']; ?></a></h1>
							<h2><?php echo $terme_options['site_description']; ?></h2>
					<?php } ?>
						<a href="#" class="mobile_menu sb-toggle-left js-toggle-left-slidebar"><span class="mobile_menu"></span></a>
					</div><!-- logo -->
				</div><!-- col-xs-6 -->
				<div class="col-sm-6 hidden-xs">
					<form role="search" method="get" id="searchform">
						<input type="text" name="s" id="s" value="" placeholder="	<?php _e( 'Search','terme' ); ?>">
						<button><i class="fa fa-search"></i></button>
					</form>
				</div><!-- col-xs-6 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- main_area -->
	<div class="main_menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<a href="#" class="mobile_menu sb-toggle-left js-toggle-left-slidebar"><span class="mobile_menu"></span></a>
						<?php echo wp_nav_menu(); ?>
					<div class="shopping_cart">
						<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','terme' ); ?>">
							<span class="icon"><i class="fa fa-shopping-bag"></i></span>
							<div class="count">
								Cart
								<span><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
							</div>
						</a>
					</div><!-- cart -->
					</div><!-- col-xs-12 -->
				</div><!-- row -->
			</div><!-- container -->
	</div><!-- main_menu -->
</header>
