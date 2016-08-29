<?php
/* Template name: Home Page */
global $terme_options; ?>
<?php get_header(); ?>
	<main class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12">
					<div class="search_content">
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
						<?php endwhile;  ?>
						<?php wp_pagenavi(); ?>

						<?php else: ?>
							<p>
								Sorry
							</p>
						<?php endif; ?>
						</ul>
					</div><!-- category_content -->
				</div><!--col-xs-8-->
				<div class="col-md-4 hidden-sm hidden-xs">
					<aside id="sidebar">
							<?php get_sidebar(); ?>
					</aside><!-- sidebar -->
								</div><!--col-xs-4-->
			</div><!-- row -->
		</div><!-- container -->
	</main>
	<?php get_footer(); ?>
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
