<?php
/* Template name: HomePage */
global $terme_options; ?>
<?php get_header(); ?>
		<main class="main">
			<section class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<?php include TEMPLATEPATH.'/inc/page-builder/elements/slider.php'; ?>
						</div><!-- col-md-8 col-xs-12 -->
						<div class="col-md-4 hidden-sm hidden-xs">
							<?php include TEMPLATEPATH.'/inc/page-builder/elements/box-0.php'; ?>
						</div><!-- col-md-4 hidden-sm hidden-xs -->
					</div>
				</div><!-- container -->
			</section><!-- top -->
			<?php if ($terme_options['newsticker']) {
          	include TEMPLATEPATH.'/inc/page-builder/elements/news-ticker.php';
      			};
						include TEMPLATEPATH.'/inc/content/layout.php'; ?>
		</main><!-- main -->
<?php get_footer(); ?>
