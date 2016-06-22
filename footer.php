<?php global $terme_options; ?>
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
<?php if (isset($terme_options['scroll-to-top']) && !empty ($terme_options['scroll-to-top'])) { ?>
	<a href="#top" class="back_to_top"></a>
<?php } ?>
	<script>
		(function($) {
			$(document).ready(function() {
				$.slidebars();
			});
		}) (jQuery);
	</script>
	<script>
	jQuery(document).ready(function($) {
		jQuery('span.close_button').click(function() {
			jQuery('.header_ads').slideUp('slow');
		});
	});

	</script>
	<?php echo $terme_options['footer-script']; ?>
  <?php wp_footer(); ?>
</body>
</html>
