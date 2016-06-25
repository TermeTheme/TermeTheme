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
    private $subtitle_value;
    private $number_value;
    private $category_value;

    function __construct($id=0, $title_value='', $subtitle_value='', $number_value='', $category_value='') {
        $this->title = __('Category Posts', 'terme');
        $this->icon = get_template_directory_uri().'/assets/admin/images/3.png';
        $this->id = 'terme_cat_posts_style1';
        $this->title_value = $title_value;
        $this->subtitle_value = $subtitle_value;
        $this->number_value = $number_value;
        $this->category_value = $category_value;
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
                            'field' => '<input type="hidden" data-name="terme_pb['.$this->id.'][class_name]" value="Terme_Element_One">',
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
            $cat_options .= '<option value="'.$cat->term_id.'" '.selected( $this->category_value, $cat->term_id, false ).'>'.$cat->name.'</option>';
        }
        $fields = array(
                        array(
                            'field' => '<input type="hidden" name="terme_pb['.$this->id.'][class_name]" value="Terme_Element_One">',
                        ),
                        array(
                            'label' => __('Box Title:', 'terme'),
                            'field' => '<input type="text" name="terme_pb['.$this->id.'][fields]['.$id.'][title]" value="'.$this->title_value.'">',
                        ),
                        array(
                            'label' => __('Box Subtitle:', 'terme'),
                            'field' => '<input type="text" name="terme_pb['.$this->id.'][fields]['.$id.'][subtitle]" value="'.$this->subtitle_value.'">',
                        ),
                        array(
                            'label' => __('Post Number:', 'terme'),
                            'field' => '<input type="number" name="terme_pb['.$this->id.'][fields]['.$id.'][number]" value="'.$this->number_value.'">',
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
            'posts_per_page' => 1,
            'category__in' => array($this->category_value),
        );
        $args_offset = array(
            'post_type'         => 'post',
            'posts_per_page' => $this->number_value-1,
            'category__in' => array($this->category_value),
            'offset'        => 1
        );
        $cat_link = get_category_link( $this->category_value );
        $output = '<div class="box">
          <div class="title">
            <a href="'.$cat_link.'" class="more pull-right">'.__('More', 'terme').'</a>
            <h4>'.$this->title_value.'</h4>
            <h6>'.$this->subtitle_value.'</h6>
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
                      <div class="thumb"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail(get_the_id(), 'element_01_thumb_01').'</a></div>
                      '.$lid.'
                      <h2><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h2>
                      <div class="time"><i class="fa fa-clock-o"></i> '.get_the_time($terme_options['post_date_format']).'</div>
                      <div class="excerpt">'.terme_shorten_text(get_the_excerpt(), 250).'</div>
                    </div><!-- big_post -->
                  </div><!-- col-xs-6 -->
                  ';
        endwhile; wp_reset_postdata();
        $output .= '
            <div class="col-sm-6 col-xs-12">
                <div class="small_post">
                  <ul>';
        $post_list = new WP_Query($args_offset);
        while ($post_list->have_posts()):
        $post_list->the_post();
            $output .= '
            <li>
              <div class="thumb"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_post_thumbnail(get_the_id(), 'element_01_thumb_02').'</a></div>
              <h2><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h2>
              <div class="time"><i class="fa fa-clock-o"></i> '.get_the_time($terme_options['post_date_format']).'</div>
            </li>';
        endwhile; wp_reset_postdata();
        $output .= '
                    </div>
                  </div><!-- col-xs-6 -->
                </div><!-- row -->
              </div><!-- body -->
            </div><!-- box -->
            ';
        return $output;
    }


}
function test_function($elements) {
    $element = new Terme_Element_One();
    $elements[] = $element->get_dashboard_output();
    return $elements;
}
add_filter( 'after_terme_page_builder_elements', 'test_function' );
