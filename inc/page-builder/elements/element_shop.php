<?php
/**
 * Test Element Class
 * @author Mojtaba Darvishi
 * @package Terme Theme
 * @version 1.0.0
 */
class Terme_Element_Shop extends Terme_Page_Builder_Element {

    public $title;
    public $icon;
    public $id;
    public $fields;

    private $saved_vals;

    function __construct($id=0, $passed_array=array()) {
        $this->title = __('Shop Carousel', 'terme');
        $this->icon = get_template_directory_uri().'/assets/admin/images/element_01.png';
        $this->id = 'terme_shop_carousel_item';
        $this->saved_vals = $passed_array;
        if ($id==0) {
            $this->fields = $this->get_empty_fields();
        } else {
            $this->fields = $this->get_filled_fields($id);
        }

    }


    public function get_empty_fields() {

        $fields = array(
                        array(
                            'field' => '<input type="hidden" data-name="terme_pb[0][class_name]" value="Terme_Element_Shop">',
                        ),
                        array(
                            'label' => __('Box Title:', 'terme'),
                            'field' => '<input type="text" data-name="terme_pb[0][fields][title]">',
                        ),
                        array(
                            'label' => __('Box Subtitle:', 'terme'),
                            'field' => '<input type="text" data-name="terme_pb[0][fields][subtitle]">',
                        ),
                        array(
                            'label' => __('Product Number:', 'terme'),
                            'field' => '<input type="number" data-name="terme_pb[0][fields][number]">',
                        ),
                );
        return $fields;
    }

    public function get_filled_fields($id=0) {
        $fields = array(
                        array(
                            'field' => '<input type="hidden" name="terme_pb['.$id.'][class_name]" value="Terme_Element_Shop">',
                        ),
                        array(
                            'label' => __('Box Title:', 'terme'),
                            'field' => '<input type="text" name="terme_pb['.$id.'][fields][title]" value="'.$this->saved_vals['title'].'">',
                        ),
                        array(
                            'label' => __('Box Subtitle:', 'terme'),
                            'field' => '<input type="text" name="terme_pb['.$id.'][fields][subtitle]" value="'.$this->saved_vals['subtitle'].'">',
                        ),
                        array(
                            'label' => __('Post Number:', 'terme'),
                            'field' => '<input type="number" name="terme_pb['.$id.'][fields][number]" value="'.$this->saved_vals['number'].'">',
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
                        if (array_key_exists('label', $field)) {
                            $field_label = $field['label'];
                        } else {
                            $field_label = '';
                        }
                        $output .= '<tr>
                            <td>'. $field_label .'</td>
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
        global $terme_options;
        $shop_url = get_permalink(woocommerce_get_page_id('shop'));
        $output = '';
        $args_offset = array(
            'post_type'         => 'product',
            'posts_per_page' => $this->saved_vals['number']-1,
        );
        $output = '<div class="box">
          <div class="title">
            <a href="'.$shop_url.'" class="more">'.__('More', 'terme').'</a>
            <h4>'.$this->saved_vals['title'].'</h4>
            <h6>'.$this->saved_vals['subtitle'].'</h6>
          </div><!-- title -->
          <div class="body">
            <ul class="shop-carousel">
            ';
        $products = new WP_Query($args_offset);
        while ($products->have_posts()):
        $products->the_post();
        $product = new WC_Product(get_the_id());
            $output .= '
            <li>
              <div class="product">
                <div class="thumb">
                 '.get_the_post_thumbnail(get_the_id(), 'element_shop_thumb').'
                  <a href="'.do_shortcode('[add_to_cart_url id="'.get_the_id().'"]').'" class="add_to_cart">'.__('Add to cart', 'terme').'</a>
                  <a href="'.get_permalink().'" class="permalink">'.__('Description', 'terme').'</a>
                </div>
                <div class="info">
                  <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                  <div class="price">'.wc_price($product->get_price()).'</div>
                </div><!-- info -->
              </div><!-- product -->
            </li>';
        endwhile; wp_reset_postdata();
        $output .= '
        </ul><!-- shop-carousel -->
      </div><!-- body -->
    </div><!-- box -->
            ';
        return $output;
    }

    public static function get_args() {
        static $args = array();
        $args = array ('title', 'subtitle', 'number');
        return $args;
    }


}
