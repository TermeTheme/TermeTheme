<?php global $terme_options; ?>
		<?php get_header(); ?>
	<main class="main">
		<div class="container">
			<div class="row">
				<?php
                    if ($terme_options['theme_layout']==0) {
                        get_template_part( 'inc/content/content', 'loop' );
                        get_sidebar();
                    } else {
                        get_sidebar();
                        get_template_part( 'inc/content/content', 'loop' );
                    }
        ?>
			</div><!-- row -->
		</div><!-- container -->
	</main>
	<?php get_footer(); ?>
