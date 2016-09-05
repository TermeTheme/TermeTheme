<?php global $terme_options; ?>
		<?php get_header(); ?>
	<main class="main <?php echo $terme_options['pages_class']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="article_content">
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<div class="article_info ">
							<h1 class="article_title"><?php __(the_title(''), 'terme') ?></h1>
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
				</div><!--col-md-12-->
			</div><!-- row -->
		</div><!-- container -->
	</main>
	<?php get_footer(); ?>
