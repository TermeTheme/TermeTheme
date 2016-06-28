<?php
// Add Page Builder Button
add_action('edit_form_after_title', 'terme_add_page_builder');
function terme_add_page_builder() {
    global $post;
    $screen = get_current_screen();

	if( get_post_type ( $post->ID ) != 'page' || $screen->post_type != 'page' )	{
		return;
	}
    wp_nonce_field( '_terme_pb_nonce', 'terme_pb_nonce' );
    $terme_pb_status = (get_post_meta( $post->ID, 'terme_pb_status', true )) ? get_post_meta( $post->ID, 'terme_pb_status', true ) : 'false' ;
    if ($terme_pb_status=='true') {
        echo '<style>#postdivrich {display:none;}</style>';
    }
    $current_elements = get_post_meta( $post->ID, 'terme_pb', true );
    ?>

    <a href="#" class="terme_add_page_builder_button"><?php _e('Page Builder', 'terme'); ?></a>
    <input type="hidden" value="<?php echo $terme_pb_status ?>" name="terme_pb_status" id="terme_pb_status">
    <div class="terme_page_builder_container postbox" <?php echo ($terme_pb_status=='true') ? 'style="display:block"' : '' ; ?>>
        <div class="terme_pb_elements_container">
            <h2 class="hndle"><?php _e('Page Builder Elements', 'terme'); ?></h2>
            <ul>
                <?php $elements = terme_pb_get_elements(); ?>
                <?php foreach ($elements as $key => $element): ?>
                    <?php echo $element ?>
                <?php endforeach; ?>
            </ul>
        </div><!-- terme_pb_elements_container -->

        <div class="terme_pb_content_container">
            <ul>
                <?php if ($current_elements): ?>
                    <?php
                        foreach ($current_elements as $key => $element) {
                            foreach ($element['fields'] as $id => $field) {
                                $args = $element['class_name']::get_args();
                                $passed_array = array();
                                foreach ($args as $arg) {
                                    $passed_array[$arg] = $field[$arg];
                                }
                                $el_object = new $element['class_name']($id, $passed_array);
                                echo $el_object->get_dashboard_output();
                            }
                        }
                    ?>
                <?php endif; ?>

            </ul>
        </div><!-- terme_pb_content_container -->
    </div><!-- terme_page_builder_container -->


<?php }


function terme_save_page_builder( $post_id ) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        if ( ! isset( $_POST['terme_pb_nonce'] ) || ! wp_verify_nonce( $_POST['terme_pb_nonce'], '_terme_pb_nonce' ) ) return;
        if ( ! current_user_can( 'edit_post', $post_id ) ) return;

        if ( isset( $_POST['terme_pb_status'] ) ) {
            update_post_meta( $post_id, 'terme_pb_status', $_POST['terme_pb_status'] );
        }
        $terme_pb_status = get_post_meta( $post_id, 'terme_pb_status', true );
        if ($terme_pb_status=='true') {
            $terme_pb = array();
            foreach ($_POST['terme_pb'] as $key => $value) {
                $terme_pb[] = $value;
            }
            update_post_meta( $post_id, 'terme_pb', $terme_pb );
        }

}
add_action( 'save_post','terme_save_page_builder' );
