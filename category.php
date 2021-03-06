<?php get_header(); ?>
	<?php include 'inc/header/1.php'; ?>
	<main class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12">
					<div class="category_content">
						<ul>
							<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<li>
								<article>
									<figure class="thumbnail">
										<?php the_post_thumbnail( 'category_thumb' ); ?>
									</figure>
									<section>
										<h2><a href="<?php the_permalink('') ?>"><?php the_title(); ?></a></h2>
										<div class="post_time">
												<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp <?php echo get_the_date(); ?>
										</div>
										<div class="excerpt">
												<?php the_excerpt(); ?>
										</div>
									</section>
								</article>
							</li>
						<?php endwhile; else: ?>
						<?php endif; ?>
						</ul>
						<div class="wp-pagenavi">
									<a class="previouspostslink" rel="prev" href="http://hamyarwp.com/category/plugins/"><span>Previous</span> <i class="fa fa-angle-left" aria-hidden="true"></i></a>
									<a class="page smaller" href="http://hamyarwp.com/category/plugins/">1</a><span class="current">2</span>
									<a class="page larger" href="http://hamyarwp.com/category/plugins/page/3/">3</a><a class="page larger" href="http://hamyarwp.com/category/plugins/page/4/">4</a>
									<a class="page larger" href="http://hamyarwp.com/category/plugins/page/5/">5</a><span class="extend">...</span>
									<a class="larger page" href="http://hamyarwp.com/category/plugins/page/20/">20</a>
									<a class="nextpostslink" rel="next" href="http://hamyarwp.com/category/plugins/page/3/"><span>Next</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div>
								</div><!-- category_content -->
				</div><!--col-xs-8-->
				<div class="col-md-4 hidden-sm hidden-xs">
					<?php include 'inc/sidebar/sidebar.php'; ?>
				</div><!--col-xs-4-->
			</div><!-- row -->
		</div><!-- container -->
	</main>
	<?php include 'inc/footer/5.php'; ?>

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
<a href="#top" class="back_to_top"></a>
<?php get_footer(); ?>
