<header class="header style_1">
	<div class="top_bar">
		<div class="container">
			<div class="row">
				<div class="col-md-5 hidden-sm  hidden-xs">
					<div class="today">
						<i class="fa fa-calendar"></i>
						<?php the_time($terme_options['today_date_format']); ?>
					</div>
				</div><!-- col-xs-5 -->
				<div class="col-md-7 col-sm-12 col-xs-12">
					<form action="#">
						<input type="text" placeholder="Search">
						<button><i class="fa fa-search"></i></button>
					</form>
					<div class="user_area">
						<a href="#">Login</a>
						<span>or</span>
						<a href="#">Register</a>
					</div><!-- login_area -->
					<div class="shopping_cart">
						<a href="#"><i class="fa fa-shopping-bag"></i> Cart</a>

					</div><!-- cart -->
				</div><!-- col-xs-7 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- top_bar -->
	<div class="main_area">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="logo center">
						<?php if($terme_options['logo_type'] == 'logo_image') { ?>

						<a href="#"><img src="<?php echo $terme_options['logo_img']['url']; ?>" alt=""></a>
						<?php } else { ?>
							<h1><a href="#"><?php echo $terme_options['site_name']; ?></a></h1>
							<h2><?php echo $terme_options['site_description']; ?></h2>
					<?php } ?>
					</div><!-- logo -->
				</div><!-- col-xs-12 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- main_area -->
	<div class="main_menu">
		<a href="#" class="mobile_menu sb-toggle-left"><span class="mobile_menu"></span></a>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
						<?php echo wp_nav_menu(); ?>
				</div><!-- col-xs-12 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- main_menu -->
</header>
