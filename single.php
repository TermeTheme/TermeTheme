<?php global $terme_options; ?>
		<?php get_header(); ?>
	<main class="main <?php echo $terme_options['posts_class']; ?>">
		<div class="container">
			<div class="row">
				<?php
                    if ($terme_options['theme_layout']==0) {
                        get_template_part( 'inc/content/content', 'single' );
                        get_sidebar();
                    } else {
                        get_sidebar();
                        get_template_part( 'inc/content/content', 'single' );
                    }
        ?>
			</div><!-- row -->
		</div><!-- container -->
	</main>
	<?php get_footer(); ?>
