<?php
/**
 * Test Element Class
 * @author Mojtaba Darvishi
 * @package Terme Theme
 * @version 1.0.0
 */
class Terme_Element_One extends Terme_Page_Builder_Element {

    public $title;
    public $icon;
    public $id;
    public $fields;

    private $title_value;
    private $number_value;
    private $category_value;

    function __construct($id=0, $title_value='', $number_value='', $category_value='') {
        $this->title = 'Title';
        $this->icon = get_template_directory_uri().'/assets/admin/images/3.png';
        $this->id = 'myElement';
        $this->title_value = $title_value;
        $this->number_value = $number_value;
        $this->category_value = $category_value;
        if ($id==0) {
            $this->fields = $this->get_empty_fields();
        } else {
            $this->fields = $this->get_filled_fields($id);
        }

    }


    public function get_empty_fields() {
        $fields = array(
                        array(
                            'field' => '<input type="hidden" data-name="terme_pb['.$this->id.'][class_name]" value="Terme_Element_One">',
                        ),
                        array(
                            'label' => 'Box Title',
                            'field' => '<input type="text" data-name="terme_pb['.$this->id.'][fields][0][title]">',
                        ),
                        array(
                            'label' => 'Post Number',
                            'field' => '<input type="number" data-name="terme_pb['.$this->id.'][fields][0][number]">',
                        ),
                        array(
                            'label' => 'Category Select',
                            'field' => '<select class="" data-name="terme_pb['.$this->id.'][fields][0][category]">
                                <option value="1">Option one</option>
                                <option value="2">Option two</option>
                                <option value="3">Option three</option>
                            </select>',
                        ),
                );
        return $fields;
    }

    public function get_filled_fields($id=0) {
        $fields = array(
                        array(
                            'field' => '<input type="hidden" name="terme_pb['.$this->id.'][class_name]" value="Terme_Element_One">',
                        ),
                        array(
                            'label' => 'Box Title',
                            'field' => '<input type="text" name="terme_pb['.$this->id.'][fields]['.$id.'][title]" value="'.$this->title_value.'">',
                        ),
                        array(
                            'label' => 'Post Number',
                            'field' => '<input type="number" name="terme_pb['.$this->id.'][fields]['.$id.'][number]" value="'.$this->number_value.'">',
                        ),
                        array(
                            'label' => 'Category Select',
                            'field' => '<select class="" name="terme_pb['.$this->id.'][fields]['.$id.'][category]">
                                <option value="1" '.selected( $this->category_value, '1', false ).'>Option one</option>
                                <option value="2" '.selected( $this->category_value, '2', false ).'>Option two</option>
                                <option value="3" '.selected( $this->category_value, '3', false ).'>Option three</option>
                            </select>',
                        ),
                );
        return $fields;
    }

    public function get_dashboard_output() {
        $output = '<li data-id="'.$this->id.'">
            <a href="#" class="terme_pb_item_toggle" data-tooltip="'.$this->title.'">
                <img src="'.$this->icon.'" alt="" />
                <span class="dashicons dashicons-admin-generic"></span>
            </a>
            <div class="pb_item_setting">
                <table>
                    <tbody>';
                    foreach ($this->fields as $key => $field) {
                        $output .= '<tr>
                            <td>'.$field['label'].'</td>
                            <td>'.$field['field'].'</td>
                        </tr>';
                    }
            $output .= '
                    </tbody>
                </table>
                <a href="#" class="terme_pb_delete_element">'.__('Delete', 'terme').'</a>
            </div><!-- pb_item_setting -->
        </li>';
        return $output;
    }

    public function get_frontend_output() {
        $output = '';
        $args = array(
            'post_type'         => 'product',
            'posts_per_page' => -1,
        );
        $my_query = new WP_Query($args);
        while ($my_query->have_posts()):
        $my_query->the_post();
        $do_not_duplicate = $post->ID;

            $output .= '<h3>'.$fields->title.'</h3>';
            $output .= '<a href="'.get_permalink().'">'.get_the_title().'</a>';

        endwhile; wp_reset_postdata();
        return $output;
    }


}
function test_function($elements) {
    $element = new Terme_Element_One();
    $elements[] = $element->get_dashboard_output();
    return $elements;
}
add_filter( 'after_terme_page_builder_elements', 'test_function' );
