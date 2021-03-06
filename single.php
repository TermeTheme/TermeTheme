<?php get_header(); ?>
	<?php include 'inc/header/1.php'; ?>
	<main class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12 col-xs-12">
					<div class="article_content">
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<div class="article_info ">
							<div class="breadcrumbs">
								<span><a href="#">Home</a>
										<i class="fa fa-angle-right" aria-hidden="true"></i>
								</span>
								<a href="#">Sport Category</a>
							</div>
							<h1 class="article_title"><?php the_title(''); ?></h1>
							<div class="article_meta">
								<span class="time"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp <?php echo get_the_date(); ?> </span>
								<span class="category"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp <a href="#"><?php the_category($post->ID); ?></a> </span>
								<span class="view"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp 1.253</span>
								<span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>&nbsp <?php comments_number( 0, 1, $more ); ?> </span>
							</div><!-- article_meta -->
						</div><!-- article_info -->
						<div class="terme_post">
							<div class="thumb">
								<?php the_post_thumbnail( '' ); ?>
							</div>
								<?php the_content(''); ?>
							<div class="article_tags">
								<h3>Tags:</h3>
								<a href="#" data-termehover="">Sports</a>
					      <a href="#">best offer</a>
					      <a href="#">terme</a>
					      <a href="#">game</a>
					      <a href="#">Sports</a>
					      <a href="#">Logic</a>
					      <a href="#">politics</a>
					      <a href="#">Logic</a>
					      <a href="#">terme</a>
							</div><!-- article_tags -->
							<div class="article_social">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-wordpress" aria-hidden="true"></i></a></li>
								</ul>
							</div><!-- article_social -->
						</div><!-- terme_post -->
						<div class="article_author">
								<?php echo get_avatar( $comment, 90 ); ?>
								<div class="name">
										<a href="<?php the_author_meta( 'user_email' ); ?>"><?php the_author_meta( 'display_name' ); ?></a>
									<span><?php the_author_posts(); ?> Article</span>
								</div>
								<div class="desc">
									<p>
										<?php the_author_meta( 'user_description' ); ?>
									</p>
								</div>
						</div>
						<div class="article_related">
							<?php
									$tags = wp_get_post_tags($post->ID);
									if ($tags) {
										$tag_ids = array();
										foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
										$args=array(
											'tag__in' => $tag_ids,
											'post__not_in' => array($post->ID),
											'showposts'=>5, // Number of related posts that will be shown.
											'caller_get_posts'=>1
										);
										$my_query = new wp_query($args);
										if( $my_query->have_posts() ) {
											echo '<h4>Related Post</h4>
											<ul>';
											while ($my_query->have_posts()) {
												$my_query->the_post();
											?>
											<li>
												<div class="thumb"><?php the_post_thumbnail( 'related_thumb' ); ?></div>
												<h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
												<div class="time"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></div>
											</li>
											<?php
											}
											echo '</ul>';
										}
									}
									?>
						</div>
	<?php include 'comments.php' ?>
<?php endwhile; else: ?>
<?php endif; ?>
					</div><!-- article_content -->
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
