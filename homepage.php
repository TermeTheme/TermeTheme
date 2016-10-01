<?php
/* Template name: HomePage */
global $terme_options;
get_header();
?>
		<main class="main">
			<?php if ( isset($terme_options['slider']) && !empty($terme_options['slider']) ): ?>
    			<section class="top">
    				<div class="container">
    					<div class="row">
    						<div class="col-md-8 col-xs-12">
    							<?php include get_template_directory().'/inc/page-builder/elements/slider.php'; ?>
    						</div><!-- col-md-8 col-xs-12 -->
    						<div class="col-md-4 hidden-sm hidden-xs">
    							<?php include get_template_directory().'/inc/page-builder/elements/box-0.php'; ?>
    						</div><!-- col-md-4 hidden-sm hidden-xs -->
    					</div>
    				</div><!-- container -->
    			</section><!-- top -->
            <?php endif; ?>
			<?php
                if ($terme_options['newsticker']) { include get_template_directory().'/inc/page-builder/elements/news-ticker.php'; };
	            include get_template_directory().'/inc/content/layout.php';
            ?>
		</main><!-- main -->
<?php get_footer(); ?>
