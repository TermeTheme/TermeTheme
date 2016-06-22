<?php global $terme_options; ?>
		<?php get_header(); ?>
		<?php if ($terme_options['header_layout'] == '1') {
			include TEMPLATEPATH . '/inc/header/1.php';
		}elseif ($terme_options['header_layout'] == '2') {
			include TEMPLATEPATH . '/inc/header/2.php';
		}elseif ($terme_options['header_layout'] == '3') {
			include TEMPLATEPATH . '/inc/header/3.php';
		}else {
			include TEMPLATEPATH . '/inc/header/4.php';
		}
			?>
	<main class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12 col-xs-12">
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


                                <!-- <pre style="text-align:left; padding:30px"> -->

    								<?php the_content('');

                                    $terme_pb_status = get_post_meta( get_the_ID(), 'terme_pb_status', true );
                                    if ($terme_pb_status=='true') {
                                        $terme_pb = get_post_meta( get_the_ID(), 'terme_pb', true );
                                        // print_r($terme_pb);

                                        foreach ($terme_pb as $key => $element) {
                                            foreach ($element['fields'] as $id => $field) {
                                                $el_object = new $element['class_name']($id, $field['title'], $field['number'], $field['category']);
                                                // $el_object->set_fields_value('1','2','3');
                                                // echo $el_object->test();
                                                echo $el_object->get_frontend_output();
                                            }
                                        }

                                    }

                                     ?>
                                 </pre>


								<?php if($terme_options['post_tags']) { ?>
							<div class="article_tags">
								<h3>Tags:</h3>
									<?php
											$posttags = get_the_tags();
											foreach ( $posttags as $tag ) {
												$tag_link = get_tag_link( $tag->term_id );
												$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}' data-termehover=''>";
												$html .= "{$tag->name}</a>";
											}
									echo $html; ?>
							</div><!-- article_tags -->
							<?php } ?>
							<?php if($terme_options['post_share']) { ?>
							<div class="article_social">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-wordpress" aria-hidden="true"></i></a></li>
								</ul>
							</div><!-- article_social -->
							<?php } ?>

						</div><!-- terme_post -->
						<?php if($terme_options['author_box']) { ?>
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
						<?php } ?>
						<?php if($terme_options['related_posts']) { ?>
						<div class="article_related">
							<?php
									$tags = wp_get_post_tags($post->ID);
									if ($tags) {
										$tag_ids = array();
										foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
										$args=array(
											'tag__in' => $tag_ids,
											'post__not_in' => array($post->ID),
											'showposts'=>$terme_options['related_number_of_posts'], // Number of related posts that will be shown.
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
						<?php } ?>
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
					<?php include 'inc/sidebar/sidebar.php'; ?>
				</div><!--col-xs-4-->
			</div><!-- row -->
		</div><!-- container -->
	</main>
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
	</div><!-- sb-site -->
	<div class="sb-slidebar sb-left">
		<div class="sidebar_menu">
			<?php echo wp_nav_menu(); ?>
		</div>
	</div><!-- sb-left -->
	<?php if($terme_options['scroll-to-top']) { ?>
	<a href="#top" class="back_to_top"></a>
	<?php } ?>
	<?php get_footer(); ?>
