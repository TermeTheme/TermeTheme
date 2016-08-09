<?php global $terme_options; ?>
		<?php get_header(); ?>
	<main class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="article_content">
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<div class="article_info ">
							<?php if($terme_options['post_breadcrumb']) { ?>
							<div class="breadcrumbs">
								<span><a href="#">Home</a>
										<i class="fa fa-angle-right" aria-hidden="true"></i>
								</span>
								<a href="#">Sport Category</a>
							</div>
							<?php } ?>
							<h1 class="article_title"><?php the_title(''); ?></h1>
						</div><!-- article_info -->
						<div class="terme_post">
							<div class="thumb">
								<?php the_post_thumbnail( '' ); ?>
							</div>
							<?php the_content(''); ?>
						</div><!-- terme_post -->
						<?php if($terme_options['post_comments']) { ?>
						<div class="article_comment">

	<?php comments_template(); ?>
	</div>
	<?php } ?>

<?php endwhile; else: ?>
<?php endif; ?>
					</div><!-- article_content -->
				</div><!--col-xs-8-->
				<div class="col-md-4 hidden-sm hidden-xs">
					<?php //include 'inc/sidebar/sidebar.php'; ?>
				</div><!--col-xs-4-->
			</div><!-- row -->
		</div><!-- container -->
	</main>

	<?php get_footer(); ?>
