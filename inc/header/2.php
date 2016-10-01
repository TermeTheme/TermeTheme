<?php global $terme_options; ?>
<header class="header style_1">
	<?php if ( $terme_options['hide_top_bar'] == '1' ) { ?>
	<div class="top_bar">
		<div class="container">
			<div class="row">
				<div class="col-md-3 hidden-sm  hidden-xs">
					<div class="today">
						<i class="fa fa-calendar"></i>
						<?php the_time($terme_options['today_date_format']); ?>
					</div>
				</div><!-- col-md-3 -->
				<div class="col-md-9 col-sm-12 col-xs-12">
					<form role="search" method="get" id="searchform">
						<input type="text" name="s" id="s" value="" placeholder="<?php _e('Search','terme' ); ?>">
						<button><i class="fa fa-search"></i></button>
					</form>
					<div class="user_area">
						<?php if( is_user_logged_in()) { ?>
							<a href="<?php echo wp_logout_url( home_url() ); ?>">	<?php echo $terme_options['logout_text']; ?></a>
						<?php } else { ?>
							<a href="<?php echo get_page_link($terme_options['login_page']); ?>">	<?php echo $terme_options['login_text']; ?></a>
							<span>	<?php _e( 'OR','terme' ); ?></span>
							<a href="<?php echo get_page_link($terme_options['register_page']); ?>">	<?php echo $terme_options['register_text']; ?></a>
						<?php } ?>
					</div><!-- login_area -->
					<?php if (class_exists('WooCommerce')) { ?>
					<div class="shopping_cart">
						<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','terme' ); ?>">
							<span class="icon"><i class="fa fa-shopping-bag"></i></span>
							<div class="count">
									<?php _e( 'Cart','terme' ); ?>
								<span><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count(),'terme' ), WC()->cart->get_cart_contents_count() ); ?></span>
							</div>
						</a>
					</div><!-- cart -->
					<?php } ?>
				</div><!-- col-md-9 -->
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- top_bar -->
	<?php } ?>
	<div class="main_area">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<a href="#" class="mobile_menu js-toggle-left-slidebar"><span class="mobile_menu1"></span></a>

					<div class="logo center">
						<?php if($terme_options['logo_type'] == 'logo_image') { ?>

						<a href="<?php esc_url( home_url() ); ?>"><img src="<?php echo $terme_options['logo_img']['url']; ?>" alt=""></a>
						<?php } else { ?>
							<h1><a href="<?php esc_url( home_url() ); ?>"><?php echo $terme_options['site_name']; ?></a></h1>
							<h2><?php echo $terme_options['site_description']; ?></h2>
					<?php } ?>
					</div><!-- logo -->
				</div><!-- col-xs-12 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- main_area -->
	<div class="main_menu">

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<a href="#" class="mobile_menu sb-toggle-left"><span class="mobile_menu"></span></a>
                    <?php
                        if (has_nav_menu('header_menu')) {
                            wp_nav_menu( array(
                                'theme_location' => 'header_menu',
                                'menu_class' => 'header_menu',
                                'container' => false
                            ) );
                        }
                    ?>
				</div><!-- col-xs-12 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- main_menu -->
</header>
