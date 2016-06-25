<?php global $terme_options; ?>
<?php get_header(); ?>
		<main class="main">
			<section class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<?php include 'inc/page-builder/slider.php'; ?>
						</div><!-- col-xs-8 -->
						<div class="col-md-4 hidden-sm hidden-xs">
							<?php include 'inc/page-builder/elements/box-0.php'; ?>
						</div><!-- col-xs-4 -->
					</div>
				</div><!-- container -->
			</section><!-- top Section -->
			<?php if ( isset($terme_options['newsticker']) && !empty ($terme_options['newsticker'])) {
				include 'inc/page-builder/news-ticker.php';
			} ?>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<div class="home_content">
								<?php include 'inc/page-builder/elements/box-1.php'; ?>
								<?php include 'inc/page-builder/elements/box-2.php'; ?>
								<?php include 'inc/page-builder/elements/box-3.php'; ?>
								<?php include 'inc/page-builder/elements/box-4.php'; ?>
								<?php include 'inc/page-builder/elements/box-5.php'; ?>
								<?php include 'inc/page-builder/elements/box-6.php'; ?>
						</div><!-- home_content -->
					</div><!--col-xs-8-->
					<div class="col-md-4 hidden-sm hidden-xs">
						<?php include 'inc/sidebar/sidebar.php'; ?>
					</div><!--col-xs-4-->
				</div><!-- row -->
			</div><!-- container -->
		</main>
	<?php get_footer(); ?>
