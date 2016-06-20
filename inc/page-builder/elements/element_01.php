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

    function __construct() {
        $this->title = 'Title';
        $this->icon = get_template_directory_uri().'/assets/admin/images/3.png';
        $this->id = 'myElement';
        $this->fields = $this->get_fields();
    }

    public function get_fields() {
        $fields = array(
                        array(
                            'label' => 'Text Field',
                            'field' => '<input type="text">',
                        ),
                        array(
                            'label' => 'Text Field',
                            'field' => '<input type="number">',
                        ),
                        array(
                            'label' => 'Select Field',
                            'field' => '<select class="" name="">
                                <option value="">Option one</option>
                                <option value="">Option two</option>
                                <option value="">Option three</option>
                            </select>',
                        ),
                );
        return $fields;
    }

    public function get_output() {
        $output = '<li id="'.$this->id.'">
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

}
function test_function($elements) {
    $element = new Terme_Element_One();
    $elements[] = $element->get_output();
    return $elements;
}
add_filter( 'after_terme_page_builder_elements', 'test_function' );
