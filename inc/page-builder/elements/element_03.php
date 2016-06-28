<?php
/**
 * Test Element Class
 * @author Mojtaba Darvishi
 * @package Terme Theme
 * @version 1.0.0
 */
class Terme_Element_Three extends Terme_Page_Builder_Element {

    public $title;
    public $icon;
    public $id;
    public $fields;

    private $saved_vals;

    function __construct($id=0, $passed_array=array()) {
        $this->title = __('Item 3', 'terme');
        $this->icon = get_template_directory_uri().'/assets/admin/images/1.png';
        $this->id = 'terme_cat_posts_style3';
        $this->saved_vals = $passed_array;
        if ($id==0) {
            $this->fields = $this->get_empty_fields();
        } else {
            $this->fields = $this->get_filled_fields($id);
        }

    }


    public function get_empty_fields() {
        $args = array(
            'orderby' => 'name',
            'hide_empty'  => true,
        );
        $categories = get_categories($args);
        $cat_options = '';
        foreach ($categories as $key => $cat) {
            $cat_options .= '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';
        }
        $fields = array(
                        array(
                            'field' => '<input type="hidden" data-name="terme_pb['.$this->id.'][class_name]" value="Terme_Element_Three">',
                        ),
                        array(
                            'label' => __('Box Title:', 'terme'),
                            'field' => '<input type="text" data-name="terme_pb['.$this->id.'][fields][0][title]">',
                        ),
                        array(
                            'label' => __('Box Subtitle:', 'terme'),
                            'field' => '<input type="text" data-name="terme_pb['.$this->id.'][fields][0][subtitle]">',
                        ),
                        array(
                            'label' => __('Post Number:', 'terme'),
                            'field' => '<input type="number" data-name="terme_pb['.$this->id.'][fields][0][number]">',
                        ),
                        array(
                            'label' => __('Category Select:', 'terme'),
                            'field' => '<select class="" data-name="terme_pb['.$this->id.'][fields][0][category]">'.$cat_options.'</select>',
                        ),
                );
        return $fields;
    }

    public function get_filled_fields($id=0) {
        $args = array(
            'orderby' => 'name',
            'hide_empty'  => true,
        );
        $categories = get_categories($args);
        $cat_options = '';
        foreach ($categories as $key => $cat) {
            $cat_options .= '<option value="'.$cat->term_id.'" '.selected( $this->saved_vals['category'], $cat->term_id, false ).'>'.$cat->name.'</option>';
        }
        $fields = array(
                        array(
                            'field' => '<input type="hidden" name="terme_pb['.$this->id.'][class_name]" value="Terme_Element_Three">',
                        ),
                        array(
                            'label' => __('Box Title:', 'terme'),
                            'field' => '<input type="text" name="terme_pb['.$this->id.'][fields]['.$id.'][title]" value="'.$this->saved_vals['title'].'">',
                        ),
                        array(
                            'label' => __('Box Subtitle:', 'terme'),
                            'field' => '<input type="text" name="terme_pb['.$this->id.'][fields]['.$id.'][subtitle]" value="'.$this->saved_vals['subtitle'].'">',
                        ),
                        array(
                            'label' => __('Post Number:', 'terme'),
                            'field' => '<input type="number" name="terme_pb['.$this->id.'][fields]['.$id.'][number]" value="'.$this->saved_vals['number'].'">',
                        ),
                        array(
                            'label' => __('Category Select:', 'terme'),
                            'field' => '<select class="" name="terme_pb['.$this->id.'][fields]['.$id.'][category]">'.$cat_options.'</select>',
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
        $output = '';
        $args_nooffset = array(
            'post_type'         => 'post',
            'posts_per_page' => $this->saved_vals['number'],
            'category__in' => array($this->saved_vals['category']),
        );
        $cat_link = get_category_link( $this->saved_vals['category'] );
        $output =
        '<div class="box">
          <div class="title">
            <a href="'.$cat_link.'" class="more pull-right">'.__('More', 'terme').'</a>
            <h4>'.$this->saved_vals['title'].'</h4>
            <h6>'.$this->saved_vals['subtitle'].'</h6>
          </div><!-- title -->
          <div class="body">
            <div class="row">
            ';
        $first_post = new WP_Query($args_nooffset);
        while ($first_post->have_posts()):
        $first_post->the_post();
            $lid = (get_post_meta( get_the_id(), 'terme_lid',  true)) ? '<h4>'.get_post_meta( get_the_id(), 'terme_lid',  true).'</h4>' : '' ;
            $output .= '

                    <div class="col-sm-6 col-xs-12">
                      <div class="big_post">
                      <div class="thumb"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail(get_the_id(), 'element_03_thumb_01').'</a></div>
                      '.$lid.'
                      <h2><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h2>
                      <div class="time"><i class="fa fa-clock-o"></i> '.get_the_time($terme_options['post_date_format']).'</div>
                        <div class="excerpt">' .get_the_excerpt().'</div>
                          </div><!-- big_post -->
                        </div><!-- col-sm-6 col-xs-12 -->

                  ';
        endwhile; wp_reset_postdata();
        $output .= '
                </div><!-- row -->
              </div><!-- body -->
            </div><!-- box -->
            ';
        return $output;
    }

    public static function get_args() {
        static $args = array();
        $args = array ('title', 'subtitle', 'number', 'category');
        return $args;
    }

}
