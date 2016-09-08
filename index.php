<?php global $terme_options; ?>
	<?php get_header(); ?>
		<main class="main <?php echo $terme_options['pages_class']; ?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="article_content">
							<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<<<<<<< HEAD
							<div class="article_info ">
								<h1 class="article_title"><?php the_title('') ?></h1>
							</div><!-- article_info -->
							<div class="terme_post">
								<div class="thumb">
									<?php the_post_thumbnail( '' ); ?>
								</div>
								<?php the_content(''); ?>
							</div><!-- terme_post -->
							<?php if ((isset($terme_postmeta['comment-display']) && !empty($terme_postmeta['comment-display']) || $terme_options['post_comments'] ) ) : ?>
								<div class="article_comment">
								<?php comments_template(); ?>
								</div>
							<?php endif; ?>
							<?php endwhile; else: ?>
=======


    							<div class="terme_post">
                                    <div class="terme_post_body">
                                        <h1 class="article_title"><a href="<?php the_permalink(); ?>"><?php the_title('') ?></a></h1>
                                        <?php the_excerpt(); ?>
                                    </div>
    							</div><!-- terme_post -->
							<?php
                                endwhile;
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'terme' ),
                                    'next_text'          => __( 'Next page', 'terme' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'terme' ) . ' </span>',
                                ) );
                                else:
                            ?>
                                <div class="article_info ">
    								<h1 class="article_title"><?php _e('Not Found!', 'terme') ?></h1>
    							</div><!-- article_info -->
    							<div class="terme_post">
    								<div class="terme_post_body">
                                        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'terme' ); ?></p>
                                        <p><?php get_search_form(); ?></p>
                                    </div>
    							</div><!--
>>>>>>> origin/develop
							<?php endif; ?>
						</div><!-- article_content -->
					</div><!--col-md-12-->
				</div><!-- row -->
			</div><!-- container -->
		</main>
	<?php get_footer(); ?>
