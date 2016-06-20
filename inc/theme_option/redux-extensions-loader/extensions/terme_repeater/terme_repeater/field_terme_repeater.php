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
if( !class_exists( 'ReduxFramework_terme_repeater' ) ) {

    /**
     * Main ReduxFramework_terme_repeater class
     *
     * @since       1.0.0
     */
    class ReduxFramework_terme_repeater extends ReduxFramework {

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


            $fields = $this->field['fields'];
            echo '<div class="terme_repeater_container">';
            echo '<table class="form-table terme_repeater">';
            echo '<tbody>';
            $data_id = 0;
            foreach ($fields as $key => $field) {
                echo '<tr data-id="'.$data_id.'">';
                $field_class = 'ReduxFramework_'.$field['type'];
                if (empty($field['name_suffix'])) {
                    $field['name_suffix'] = '['.$field['id'].']';
                }
                if (empty($field['class'])) {
                    $field['class'] = $this->field['name'].'_'.$field['id'];
                }
                if (empty($field['description'])) {
                    $field['description'] = '';
                }
                $field['name'] = $this->field['name'].'['.$data_id.']';

                if (!empty($this->value)) {
                    if (array_key_exists($field['id'], $this->value)) {
                        if ($this->value[$field['id']]) {
                            $field_value = $this->value[$field['id']];
                        } else {
                            $field_value = '';
                        }
                    } else {
                        $this->value[$field['id']] = '';
                        $field_value = '';
                    }
                } else {
                    $field_value = '';
                }

                $parent = new ReduxFramework();
                // $checkbox = new $field_class($field, $field_value, $this);
                echo '<td for="" class="redux_field_th">'.$field['title'].'<span class="description">'.$field['description'].'</span></td>';
                echo '<td>';
                $parent->_field_input($field, $field_value);
                echo "</td>";
                echo "</tr>";
            }
            echo '</tbody>';
            echo '</table>';
            echo '<a href="#" class="terme_repeater_add button">Add</a>';
            echo '</div>';
            echo '<pre>';
            print_r($this->value);
            echo '</pre>';
            ?>

            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    jQuery(document).on('click', '.terme_repeater_add', function(event) {
                        event.preventDefault();
                        var id = jQuery(this).parents('.terme_repeater_container').find('table.terme_repeater tbody tr:last-child').data('id');
                        var html = jQuery(this).parents('.terme_repeater_container').find('table.terme_repeater tbody tr:last-child').html();
                        html = html.replace(id, id+1);
                        var output = '<tr data-id="'+id+'">'+html+'</tr>';
                         jQuery(this).parents('.terme_repeater_container').find('table.terme_repeater tbody tr:last-child').after(output);
                    });
                });
            </script>

            <?php
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

            $extension = ReduxFramework_extension_terme_repeater::getInstance();

            wp_enqueue_script(
                'redux-field-icon-select-js',
                $this->extension_url . 'field_terme_repeater.js',
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
                $this->extension_url . 'field_terme_repeater.css',
                time(),
                true
            );

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
