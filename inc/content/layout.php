<?php
global $terme_options;
$option = $terme_options['theme_layout'];
 ?>
 <div class="container">
     <div class="row">
         <div class="col-md-8 col-sm-12">
             <div class="home_content">
                 <?php get_template_part( 'inc/content/content', 'loop' ); ?>
             </div><!-- home_content -->
        </div><!--col-xs-8-->
        <div class="col-xs-12 col-md-4">
            <aside id="sidebar">
                <?php get_sidebar(); ?>
            </aside><!-- sidebar -->
        </div><!--col-xs-4-->
     </div><!-- row -->
 </div><!-- container -->
