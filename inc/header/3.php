<header class="header style_3">
	<?php if ( $terme_options['hide_top_bar'] == '0' ) { ?>
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
					<form action="#">
						<input type="text" placeholder="Search">
						<button><i class="fa fa-search"></i></button>
					</form>
				</div><!-- col-md-9 -->
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
					</div><!-- logo -->
				</div><!-- col-xs-6 -->
					<?php if($terme_options['top_banner_switch']) { ?>
				<div class="col-sm-6 hidden-xs">
					<?php if ($terme_options['banner_type'] == '1') { ?>

					<div class="header_ads">
						<a href="#"><img src="<?php echo $terme_options['top_banner_img']['url'];?>" alt=""></a>
					</div><!-- header_ads -->
					<?php }else{ ?>
						<div class="header_ads">
							<a href="#"><?php echo $terme_options['custom_content']; ?></a>
						</div><!-- header_ads -->
						<?php } ?>
				</div><!-- col-xs-6 -->
				<?php } ?>

			</div><!-- row -->
		</div><!-- container -->
	</div><!-- main_area -->
	<div class="main_menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<a href="#" class="mobile_menu sb-toggle-left"><span class="mobile_menu"></span></a>
					<?php echo wp_nav_menu(); ?>
				</div><!-- col-xs-12 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- main_menu -->
</header>
