<?php
/* Template name: Home Page */
global $terme_options; ?>
<?php get_header(); ?>

		<main class="main">
			<section class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<?php include TEMPLATEPATH . '/inc/page-builder/elements/slider.php'; ?>
						</div><!-- col-xs-8 -->
						<div class="col-md-4 hidden-sm hidden-xs">
							<?php include TEMPLATEPATH . '/inc/page-builder/elements/box-0.php'; ?>
						</div><!-- col-xs-4 -->
					</div>
				</div><!-- container -->
			</section><!-- top Section -->
			<?php if ($terme_options['newsticker']) {
				include TEMPLATEPATH . '/inc/page-builder/elements/news-ticker.php';
			} ?>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<div class="home_content">
                            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                                <?php

                                $terme_pb_status = get_post_meta( get_the_ID(), 'terme_pb_status', true );
                                if ($terme_pb_status=='true') {
                                    $terme_pb = get_post_meta( get_the_ID(), 'terme_pb', true );
                                    // print_r($terme_pb);

                                    foreach ($terme_pb as $key => $element) {
                                        foreach ($element['fields'] as $id => $field) {
                                            $el_object = new $element['class_name']($id, $field['title'], $field['subtitle'], $field['number'], $field['category']);
                                            // $el_object->set_fields_value('1','2','3');
                                            // echo $el_object->test();
                                            // print_r($el_object);
                                            echo $el_object->get_frontend_output();
                                        }
                                    }

                                }

                                ?>
                            <?php endwhile; else: ?>

                            <?php endif; ?>
								<?php include TEMPLATEPATH . '/inc/page-builder/elements/box-1.php'; ?>
								<?php include TEMPLATEPATH . '/inc/page-builder/elements/box-2.php'; ?>
								<?php include TEMPLATEPATH . '/inc/page-builder/elements/box-3.php'; ?>
								<?php include TEMPLATEPATH . '/inc/page-builder/elements/box-4.php'; ?>
								<?php include TEMPLATEPATH . '/inc/page-builder/elements/box-5.php'; ?>
								<?php include TEMPLATEPATH . '/inc/page-builder/elements/box-6.php'; ?>
						</div><!-- home_content -->
					</div><!--col-xs-8-->
					<div class="col-md-4 hidden-sm hidden-xs">
						<?php include TEMPLATEPATH . '/inc/sidebar/sidebar.php'; ?>
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
	<?php if($terme_options['scroll-to-top']) { ?>
	<a href="#top" class="back_to_top"></a>
	<?php } ?>
	<?php get_footer(); ?>
