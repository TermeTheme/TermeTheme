 <?php
/* Template name: Home Page */
global $terme_options; ?>
<?php get_header(); ?>
		<main class="main">
			<section class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<?php include TEMPLATEPATH.'/inc/page-builder/elements/slider.php'; ?>
						</div><!-- col-xs-8 -->
						<div class="col-md-4 hidden-sm hidden-xs">
							<?php include TEMPLATEPATH.'/inc/page-builder/elements/box-0.php'; ?>
						</div><!-- col-xs-4 -->
					</div>
				</div><!-- container -->
			</section><!-- top Section -->
			<?php if ($terme_options['newsticker']) {
    include TEMPLATEPATH.'/inc/page-builder/elements/news-ticker.php';
} ?>
			<?php include TEMPLATEPATH.'/inc/content/layout.php'; ?>
		</main>
	</div><!-- sb-site -->

	<?php get_footer(); ?>
