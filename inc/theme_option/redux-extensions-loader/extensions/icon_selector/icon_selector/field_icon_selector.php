<?php
/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     ReduxFramework
 * @author      Dovy Paukstys
 * @version     3.1.5
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if( !class_exists( 'ReduxFramework_icon_selector' ) ) {

    /**
     * Main ReduxFramework_icon_selector class
     *
     * @since       1.0.0
     */
    class ReduxFramework_icon_selector extends ReduxFramework {

        /**
         * Field Constructor.
         *
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        function __construct( $field = array(), $value ='', $parent ) {


            $this->parent = $parent;
            $this->field = $field;
            $this->value = $value;

            if ( empty( $this->extension_dir ) ) {
                $this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
                $this->extension_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $this->extension_dir ) );
            }

            // Set default args for this field to avoid bad indexes. Change this to anything you use.
            $defaults = array(
                'options'           => array(),
                'stylesheet'        => '',
                'output'            => true,
                'enqueue'           => true,
                'enqueue_frontend'  => true
            );
            $this->field = wp_parse_args( $this->field, $defaults );

        }

        /**
         * Field Render Function.
         *
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function render() {

            // HTML output goes here
            if (!empty($this->value)) {
                $Selected_icon = $this->value;
            } else {
                $Selected_icon = "fa-angle-right";
            }
            $html = '';

            $font_path = TEMPLATEPATH.'/assets/css/font-awesome.min.css';
            $css_File = file_get_contents($font_path);
            $pattern_two = "/\.fa-[\w-]+:before\s*?/";
            preg_match_all($pattern_two, $css_File, $matches);
            $font_awesome_icons = array();
            foreach ($matches['0'] as $key => $class) {
                $class = str_replace(":before","",$class);
                $class = str_replace(".fa-","fa-",$class);
                $font_awesome_icons[$class] = $class;
            }

            $html.='<div class="field_icon_selector_ul_container">';
            $html.= '<a class="close_icon_selector" href="#"><i class="fa fa-times"></i></a>';
            $html.= '<div class="search_icon">';
            $html.= '<input type="text" autocomplete="off" value="" class="filter" placeholder="Type to Find Your Icon..." autofocus />';
            $html.= '<div class="filter-count" data-text="Founded icon: "></div>';
            $html.= '<div class="filter-selected-icon"> ';
                $html.= '<div class="display-icon"><i class="fa '.$Selected_icon.'"></i></div>';
                $html.= '<a href="#" class="button use_icon" data-value="'.$Selected_icon.'">'.__('Select Icon', 'terme').'<input type="hidden" value="'.$Selected_icon.'"></a>';
            $html.= '</div></div>';
            $html.='<ul class="terme-font-awesome field_icon_selector_ul">';
            $icons = '';
            foreach ($font_awesome_icons as $key => $v) {
                $icons.='<li><input type="radio" id="'.$key.'-'.$this->field['id'].'" name="'.$this->field['name'].'_icon" value="'.$key.'" '.checked($Selected_icon,$key,false).'><label for="'.$key.'-'.$this->field['id'].'"><i class="fa '.$key.'"></i></label><span>'.$key.'</span></li>';
            }
            $html.=$icons;
            $html.='</ul></div>';
            echo $html;
            echo '<a href="#" class="button field_icon_selector_button">'.__('Select Icon','terme').'</a>';
            echo '<span class="icon_selected"><i class="fa '.$Selected_icon.'"></i></span>';
            echo '<input type="hidden" id="' . $this->field['id'] . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" value="' . esc_attr( $Selected_icon ) . '" class="regular-text ' . $this->field['class'] . '">';
      }

        /**
         * Enqueue Function.
         *
         * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function enqueue() {

            $extension = ReduxFramework_extension_icon_selector::getInstance();

            wp_enqueue_script(
                'redux-field-icon-select-js',
                $this->extension_url . 'field_icon_selector.js',
                array( 'jquery' ),
                time(),
                true
            );

            wp_enqueue_script(
                'jquery.quicksearch',
                $this->extension_url . 'jquery.quicksearch.js',
                array( 'jquery' ),
                time(),
                true
            );


            wp_enqueue_style(
                'redux-field-icon-select-css',
                $this->extension_url . 'field_icon_selector.css',
                time(),
                true
            );

            wp_enqueue_style('FontAwesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.0.0');

        }

        /**
         * Output Function.
         *
         * Used to enqueue to the front-end
         *
         * @since       1.0.0
         * @access      public
         * @return      void
         */
        public function output() {

            if ( $this->field['enqueue_frontend'] ) {

            }

        }

    }
}
