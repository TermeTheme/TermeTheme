<?php
/* Template name: Home Page */
global $terme_options; ?>
<?php get_header(); ?>
		<main class="main">
			<section class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<?php include TEMPLATEPATH . '/inc/page-builder/elements/slider.php'; ?>
						</div><!-- col-xs-8 -->
						<div class="col-md-4 hidden-sm hidden-xs">
							<?php include TEMPLATEPATH . '/inc/page-builder/elements/box-0.php'; ?>
						</div><!-- col-xs-4 -->
					</div>
				</div><!-- container -->
			</section><!-- top Section -->
			<?php if ($terme_options['newsticker']) {
				include TEMPLATEPATH . '/inc/page-builder/elements/news-ticker.php';
			} ?>
			<div class="container">
				<div class="row">
					<?php include TEMPLATEPATH . '/inc/sidebar/layout.php'; ?>
				</div><!-- row -->
			</div><!-- container -->
		</main>

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
