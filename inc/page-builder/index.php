<?php

function terme_pb_get_elements() {
    $elements = array(
                '<li>
                    <a href="#" class="terme_pb_item_toggle" data-tooltip="Item 1">
                        <img src="'.get_bloginfo('template_url').'/assets/admin/images/1.png" alt="" />
                        <span class="dashicons dashicons-admin-generic"></span>
                    </a>
                    <div class="pb_item_setting">

                        <a href="#" class="terme_pb_delete_element">'.__('Delete', 'terme').'</a>
                    </div>
                </li>',
                '<li>
                    <a href="#" class="terme_pb_item_toggle" data-tooltip="Item 1">
                        <img src="'.get_bloginfo('template_url').'/assets/admin/images/2.png" alt="" />
                        <span class="dashicons dashicons-admin-generic"></span>
                    </a>
                    <div class="pb_item_setting">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Test Field</td>
                                    <td><input type="text" /></td>
                                </tr>
                                <tr>
                                    <td>Test Field</td>
                                    <td><select class="" name="">
                                        <option value="">Option one</option>
                                        <option value="">Option two</option>
                                        <option value="">Option three</option>
                                    </select></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="terme_pb_delete_element">'.__('Delete', 'terme').'</a>
                    </div><!-- pb_item_setting -->
                </li>',
            );
        $elements = apply_filters( 'after_terme_page_builder_elements', $elements );
        return $elements;
}
// include TEMPLATEPATH . '/inc/page-builder/elements_loader.php';
include TEMPLATEPATH . '/inc/page-builder/class.abstract.terme_page_builder_element.php';
include TEMPLATEPATH . '/inc/page-builder/elements/element_01.php';

// Add Page Builder Button
add_action('edit_form_after_title', 'terme_add_page_builder');
function terme_add_page_builder() {

    $screen = get_current_screen();

	if( get_post_type ( $post->ID ) != 'page' || $screen->post_type != 'page' )	{
		return;
	} ?>

    <a href="#" class="terme_add_page_builder_button"><?php _e('Page Builder', 'terme'); ?></a>
    <div class="terme_page_builder_container postbox">
        <div class="terme_pb_elements_container">
            <h2 class="hndle"><?php _e('Page Builder Elements', 'terme'); ?></h2>
            <ul>
                <?php $elements = terme_pb_get_elements(); ?>
                <?php foreach ($elements as $key => $element): ?>
                    <?php echo $element ?>
                <?php endforeach; ?>
            </ul>
        </div><!-- terme_pb_elements_container -->

        <div class="terme_pb_content_container"><ul></ul></div><!-- terme_pb_content_container -->
    </div><!-- terme_page_builder_container -->


<?php }

function terme_page_builder_enqueue_scripts(){
    $screen = get_current_screen();
	if( get_post_type ( $post->ID ) != 'page' || $screen->post_type != 'page' )	{
		return;
	}
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-droppable');
}
add_action('admin_enqueue_scripts','terme_page_builder_enqueue_scripts');
