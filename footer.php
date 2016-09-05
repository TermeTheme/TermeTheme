<?php global $terme_options; ?>
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
<?php
 if (isset($terme_options['scroll_to_top']) && !empty ($terme_options['scroll_to_top'])) { ?>
	<a href="#top" class="back_to_top"></a>
<?php } ?>
</div><!-- sb-site -->
<?php if (is_rtl()): ?>

<?php endif; ?>
<div off-canvas="slidebar-1 <?php echo (is_rtl()) ? "left" : "right"; ?> reveal" class="sb-left">
	<div class="sidebar_menu">
		<div class="user_area">
			<?php if( is_user_logged_in() ) {
					$user = get_current_user_id();
					echo get_avatar( $user, 100 );
				?>
				<div class="clearfix"></div>
				<a href="<?php echo wp_logout_url( home_url() ); ?>">	<?php _e( 'Logout','terme' ); ?></a>
			<?php } else {
					echo get_avatar( $user, 100 );?>
					<div class="clearfix"></div>
					<a href="<?php echo wp_login_url( home_url() ); ?>" class="login">	<?php _e( 'Login','terme' ); ?></a>
					<span>	<?php _e( 'OR','terme' ); ?></span>
					<a href="#" class="register">	<?php _e( 'Register','terme' ); ?></a>
			 <?php }; ?>
		</div><!-- user_area -->
		<div class="shopping_cart">
			<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','terme' ); ?>">
				<span class="icon"><i class="fa fa-shopping-bag"></i></span>
				<div class="count">
					<?php _e('Cart', 'terme') ?>
					<span><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
				</div>
			</a>
		</div><!-- cart -->
		<form role="search" method="get" id="searchform">
			<input type="text" name="s" id="s" value="" placeholder="	<?php _e( 'Search','terme' ); ?>">
			<button><i class="fa fa-search"></i></button>
		</form>
			<?php
			if (has_nav_menu('header_menu')) {
				wp_nav_menu( array(
					'theme_location' => 'header_menu',
					'menu_class' => 'accordion',
					'container' => false
				) );
			}?>
	</div><!-- sidebar_menu -->
</div><!-- sb-left -->
	<?php echo $terme_options['footer-script']; ?>
  <?php wp_footer(); ?>
<script>
( function ( $ ) {
			// Initialize Slidebars
			var controller = new slidebars();
			controller.init();
			// Toggle Slidebars
			$( '.js-toggle-left-slidebar' ).on( 'click', function ( event ) {
	        event.stopPropagation();
	        controller.toggle( 'slidebar-1' );
	    } );
			// Close any
	    $( controller.events ).on( 'opened', function () {
	        $( '[canvas="container"]' ).addClass( 'js-close-any-slidebar' );
	    } );
	    $( controller.events ).on( 'closed', function () {
	        $( '[canvas="container"]' ).removeClass( 'js-close-any-slidebar' );
	    } );
	    $( 'body' ).on( 'click', '.js-close-any-slidebar', function ( event ) {
	        event.stopPropagation();
	        controller.close();
	    } );
		} ) ( jQuery );
</script>
</body>
</html>
