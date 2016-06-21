<?php global $terme_options; ?>
<?php get_header(); ?>
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
		<main class="main">
			<section class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<?php include 'inc/page-bulider/slider.php'; ?>
						</div><!-- col-xs-8 -->
						<div class="col-md-4 hidden-sm hidden-xs">
							<?php include 'inc/page-bulider/box-0.php'; ?>
						</div><!-- col-xs-4 -->
					</div>
				</div><!-- container -->
			</section><!-- top Section -->
			<?php if ($terme_options['newsticker']) {
				include 'inc/page-bulider/news-ticker.php';
			} ?>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<div class="home_content">
								<?php include 'inc/page-bulider/box-1.php'; ?>
								<?php include 'inc/page-bulider/box-2.php'; ?>
								<?php include 'inc/page-bulider/box-3.php'; ?>
								<?php include 'inc/page-bulider/box-4.php'; ?>
								<?php include 'inc/page-bulider/box-5.php'; ?>
								<?php include 'inc/page-bulider/box-6.php'; ?>
						</div><!-- home_content -->
					</div><!--col-xs-8-->
					<div class="col-md-4 hidden-sm hidden-xs">
						<?php include 'inc/sidebar/sidebar.php'; ?>
					</div><!--col-xs-4-->
				</div><!-- row -->
			</div><!-- container -->
		</main>
		<?php if ($terme_options['footer_layout'] == '1') {
			include TEMPLATEPATH . '/inc/footer/1.php';
		}elseif ($terme_options['footer_layout'] == '2') {
			include TEMPLATEPATH . '/inc/footer/2.php';
		}elseif ($terme_options['footer_layout'] == '3') {
			include TEMPLATEPATH . '/inc/footer/3.php';
		}elseif ($terme_options['footer_layout'] == '4') {
			include TEMPLATEPATH . '/inc/footer/4.php';
		}else {
			include TEMPLATEPATH . '/inc/footer/5.php';
		}
			?>
	</div><!-- sb-site -->
	<div class="sb-slidebar sb-left">
		<div class="sidebar_menu">
			<ul>
				<li><a href="#">Homapage</a></li>
				<li><a href="#">Archives</a></li>
				<li><a href="#">Category</a>
					<ul>
						<li><a href="#">section1</a></li>
						<li><a href="#">section1</a></li>
						<li><a href="#">section1</a></li>
					</ul>
				</li>
				<li><a href="#">Newsletters</a></li>
				<li><a href="#">shop</a></li>
			</ul>
		</div>
	</div><!-- sb-left -->
	<?php if($terme_options['scroll-to-top']) { ?>
	<a href="#top" class="back_to_top"></a>
	<?php } ?>
	<?php get_footer(); ?>
