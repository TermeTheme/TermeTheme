<?php global $terme_options; ?>
	<!-- <script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/typed.js"></script>
	<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/js/slidebars.min.js"></script>
	<script type="text/javascript" src="assets/js/terme.js"></script> -->
	<script>
		(function($) {
			$(document).ready(function() {
				$.slidebars();
			});
		}) (jQuery);
	</script>
	<?php echo $terme_options['footer-script']; ?>
  <?php wp_footer(); ?>
</body>
</html>
