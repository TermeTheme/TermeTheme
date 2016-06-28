<?php
add_action( 'add_meta_boxes','terme_add_meta_box' );

function terme_add_meta_box () {
  $screens = array ('page');
   foreach ($screens as $screen) {
     add_meta_box(
         $terme_test,
         'setting',
         'terme_function_test',
         $screen,
         'normal',
         'high'
     );
   }
}
function terme_function_test () {

}
 ?>
