<?php
function terme_pb_get_elements() {
    $elements = array(
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
                                    <td><input type="text" data-name="terme_pb[el_id][text]"></td>
                                </tr>
                                <tr>
                                    <td>Test Field</td>
                                    <td><select class="" data-name="terme_pb[el_id][select]">
                                        <option value="1">Option one</option>
                                        <option value="2">Option two</option>
                                        <option value="3">Option three</option>
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

function terme_page_builder_enqueue_scripts(){
    $screen = get_current_screen();
	if( get_post_type ( $post->ID ) != 'page' || $screen->post_type != 'page' )	{
		return;
	}
	wp_enqueue_script('jquery-ui-draggable');
	wp_enqueue_script('jquery-ui-droppable');
}
add_action('admin_enqueue_scripts','terme_page_builder_enqueue_scripts');

// include TEMPLATEPATH . '/inc/page-builder/elements_loader.php';
include TEMPLATEPATH . '/inc/page-builder/class.abstract.terme_page_builder_element.php';
include TEMPLATEPATH . '/inc/page-builder/elements/element_01.php';
include TEMPLATEPATH . '/inc/page-builder/metabox.php';
