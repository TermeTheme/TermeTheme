<?php global $terme_options; ?>
		<?php get_header(); ?>
	<main class="main <?php echo $terme_options['categories_class']; ?>">
		<div class="container">
			<div class="row">
				<?php
                    if ($terme_options['theme_layout']==0) {
                        get_template_part( 'inc/content/content', 'category' );
                        get_sidebar();
                    } else {
                        get_sidebar();
                        get_template_part( 'inc/content/content', 'category' );
                    }
        ?>
			</div><!-- row -->
		</div><!-- container -->
	</main>
	<?php get_footer(); ?>
