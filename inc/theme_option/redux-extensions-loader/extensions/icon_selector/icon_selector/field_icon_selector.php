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
            $font_awesome_icons = array( 'fa-glass' => '\f000', 'fa-music' => '\f001', 'fa-search' => '\f002', 'fa-envelope-o' => '\f003', 'fa-heart' => '\f004', 'fa-star' => '\f005', 'fa-star-o' => '\f006', 'fa-user' => '\f007', 'fa-film' => '\f008', 'fa-th-large' => '\f009', 'fa-th' => '\f00a', 'fa-th-list' => '\f00b', 'fa-check' => '\f00c', 'fa-times' => '\f00d', 'fa-search-plus' => '\f00e', 'fa-search-minus' => '\f010', 'fa-power-off' => '\f011', 'fa-signal' => '\f012', 'fa-cog' => '\f013', 'fa-trash-o' => '\f014', 'fa-home' => '\f015', 'fa-file-o' => '\f016', 'fa-clock-o' => '\f017', 'fa-road' => '\f018', 'fa-download' => '\f019', 'fa-arrow-circle-o-down' => '\f01a', 'fa-arrow-circle-o-up' => '\f01b', 'fa-inbox' => '\f01c', 'fa-play-circle-o' => '\f01d', 'fa-repeat' => '\f01e', 'fa-refresh' => '\f021', 'fa-list-alt' => '\f022', 'fa-lock' => '\f023', 'fa-flag' => '\f024', 'fa-headphones' => '\f025', 'fa-volume-off' => '\f026', 'fa-volume-down' => '\f027', 'fa-volume-up' => '\f028', 'fa-qrcode' => '\f029', 'fa-barcode' => '\f02a', 'fa-tag' => '\f02b', 'fa-tags' => '\f02c', 'fa-book' => '\f02d', 'fa-bookmark' => '\f02e', 'fa-print' => '\f02f', 'fa-camera' => '\f030', 'fa-font' => '\f031', 'fa-bold' => '\f032', 'fa-italic' => '\f033', 'fa-text-height' => '\f034', 'fa-text-width' => '\f035', 'fa-align-left' => '\f036', 'fa-align-center' => '\f037', 'fa-align-right' => '\f038', 'fa-align-justify' => '\f039', 'fa-list' => '\f03a', 'fa-outdent' => '\f03b', 'fa-indent' => '\f03c', 'fa-video-camera' => '\f03d', 'fa-picture-o' => '\f03e', 'fa-pencil' => '\f040', 'fa-map-marker' => '\f041', 'fa-adjust' => '\f042', 'fa-tint' => '\f043', 'fa-pencil-square-o' => '\f044', 'fa-share-square-o' => '\f045', 'fa-check-square-o' => '\f046', 'fa-arrows' => '\f047', 'fa-step-backward' => '\f048', 'fa-fast-backward' => '\f049', 'fa-backward' => '\f04a', 'fa-play' => '\f04b', 'fa-pause' => '\f04c', 'fa-stop' => '\f04d', 'fa-forward' => '\f04e', 'fa-fast-forward' => '\f050', 'fa-step-forward' => '\f051', 'fa-eject' => '\f052', 'fa-chevron-left' => '\f053', 'fa-chevron-right' => '\f054', 'fa-plus-circle' => '\f055', 'fa-minus-circle' => '\f056', 'fa-times-circle' => '\f057', 'fa-check-circle' => '\f058', 'fa-question-circle' => '\f059', 'fa-info-circle' => '\f05a', 'fa-crosshairs' => '\f05b', 'fa-times-circle-o' => '\f05c', 'fa-check-circle-o' => '\f05d', 'fa-ban' => '\f05e', 'fa-arrow-left' => '\f060', 'fa-arrow-right' => '\f061', 'fa-arrow-up' => '\f062', 'fa-arrow-down' => '\f063', 'fa-share' => '\f064', 'fa-expand' => '\f065', 'fa-compress' => '\f066', 'fa-plus' => '\f067', 'fa-minus' => '\f068', 'fa-asterisk' => '\f069', 'fa-exclamation-circle' => '\f06a', 'fa-gift' => '\f06b', 'fa-leaf' => '\f06c', 'fa-fire' => '\f06d', 'fa-eye' => '\f06e', 'fa-eye-slash' => '\f070', 'fa-exclamation-triangle' => '\f071', 'fa-plane' => '\f072', 'fa-calendar' => '\f073', 'fa-random' => '\f074', 'fa-comment' => '\f075', 'fa-magnet' => '\f076', 'fa-chevron-up' => '\f077', 'fa-chevron-down' => '\f078', 'fa-retweet' => '\f079', 'fa-shopping-cart' => '\f07a', 'fa-folder' => '\f07b', 'fa-folder-open' => '\f07c', 'fa-arrows-v' => '\f07d', 'fa-arrows-h' => '\f07e', 'fa-bar-chart-o' => '\f080', 'fa-twitter-square' => '\f081', 'fa-facebook-square' => '\f082', 'fa-camera-retro' => '\f083', 'fa-key' => '\f084', 'fa-cogs' => '\f085', 'fa-comments' => '\f086', 'fa-thumbs-o-up' => '\f087', 'fa-thumbs-o-down' => '\f088', 'fa-star-half' => '\f089', 'fa-heart-o' => '\f08a', 'fa-sign-out' => '\f08b', 'fa-linkedin-square' => '\f08c', 'fa-thumb-tack' => '\f08d', 'fa-external-link' => '\f08e', 'fa-sign-in' => '\f090', 'fa-trophy' => '\f091', 'fa-github-square' => '\f092', 'fa-upload' => '\f093', 'fa-lemon-o' => '\f094', 'fa-phone' => '\f095', 'fa-square-o' => '\f096', 'fa-bookmark-o' => '\f097', 'fa-phone-square' => '\f098', 'fa-twitter' => '\f099', 'fa-facebook' => '\f09a', 'fa-github' => '\f09b', 'fa-unlock' => '\f09c', 'fa-credit-card' => '\f09d', 'fa-rss' => '\f09e', 'fa-hdd-o' => '\f0a0', 'fa-bullhorn' => '\f0a1', 'fa-bell' => '\f0f3', 'fa-certificate' => '\f0a3', 'fa-hand-o-right' => '\f0a4', 'fa-hand-o-left' => '\f0a5', 'fa-hand-o-up' => '\f0a6', 'fa-hand-o-down' => '\f0a7', 'fa-arrow-circle-left' => '\f0a8', 'fa-arrow-circle-right' => '\f0a9', 'fa-arrow-circle-up' => '\f0aa', 'fa-arrow-circle-down' => '\f0ab', 'fa-globe' => '\f0ac', 'fa-wrench' => '\f0ad', 'fa-tasks' => '\f0ae', 'fa-filter' => '\f0b0', 'fa-briefcase' => '\f0b1', 'fa-arrows-alt' => '\f0b2', 'fa-users' => '\f0c0', 'fa-link' => '\f0c1', 'fa-cloud' => '\f0c2', 'fa-flask' => '\f0c3', 'fa-scissors' => '\f0c4', 'fa-files-o' => '\f0c5', 'fa-paperclip' => '\f0c6', 'fa-floppy-o' => '\f0c7', 'fa-square' => '\f0c8', 'fa-bars' => '\f0c9', 'fa-list-ul' => '\f0ca', 'fa-list-ol' => '\f0cb', 'fa-strikethrough' => '\f0cc', 'fa-underline' => '\f0cd', 'fa-table' => '\f0ce', 'fa-magic' => '\f0d0', 'fa-truck' => '\f0d1', 'fa-pinterest' => '\f0d2', 'fa-pinterest-square' => '\f0d3', 'fa-google-plus-square' => '\f0d4', 'fa-google-plus' => '\f0d5', 'fa-money' => '\f0d6', 'fa-caret-down' => '\f0d7', 'fa-caret-up' => '\f0d8', 'fa-caret-left' => '\f0d9', 'fa-caret-right' => '\f0da', 'fa-columns' => '\f0db', 'fa-sort' => '\f0dc', 'fa-sort-desc' => '\f0dd', 'fa-sort-asc' => '\f0de', 'fa-envelope' => '\f0e0', 'fa-linkedin' => '\f0e1', 'fa-undo' => '\f0e2', 'fa-gavel' => '\f0e3', 'fa-tachometer' => '\f0e4', 'fa-comment-o' => '\f0e5', 'fa-comments-o' => '\f0e6', 'fa-bolt' => '\f0e7', 'fa-sitemap' => '\f0e8', 'fa-umbrella' => '\f0e9', 'fa-clipboard' => '\f0ea', 'fa-lightbulb-o' => '\f0eb', 'fa-exchange' => '\f0ec', 'fa-cloud-download' => '\f0ed', 'fa-cloud-upload' => '\f0ee', 'fa-user-md' => '\f0f0', 'fa-stethoscope' => '\f0f1', 'fa-suitcase' => '\f0f2', 'fa-bell-o' => '\f0a2', 'fa-coffee' => '\f0f4', 'fa-cutlery' => '\f0f5', 'fa-file-text-o' => '\f0f6', 'fa-building-o' => '\f0f7', 'fa-hospital-o' => '\f0f8', 'fa-ambulance' => '\f0f9', 'fa-medkit' => '\f0fa', 'fa-fighter-jet' => '\f0fb', 'fa-beer' => '\f0fc', 'fa-h-square' => '\f0fd', 'fa-plus-square' => '\f0fe', 'fa-angle-double-left' => '\f100', 'fa-angle-double-right' => '\f101', 'fa-angle-double-up' => '\f102', 'fa-angle-double-down' => '\f103', 'fa-angle-left' => '\f104', 'fa-angle-right' => '\f105', 'fa-angle-up' => '\f106', 'fa-angle-down' => '\f107', 'fa-desktop' => '\f108', 'fa-laptop' => '\f109', 'fa-tablet' => '\f10a', 'fa-mobile' => '\f10b', 'fa-circle-o' => '\f10c', 'fa-quote-left' => '\f10d', 'fa-quote-right' => '\f10e', 'fa-spinner' => '\f110', 'fa-circle' => '\f111', 'fa-reply' => '\f112', 'fa-github-alt' => '\f113', 'fa-folder-o' => '\f114', 'fa-folder-open-o' => '\f115', 'fa-smile-o' => '\f118', 'fa-frown-o' => '\f119', 'fa-meh-o' => '\f11a', 'fa-gamepad' => '\f11b', 'fa-keyboard-o' => '\f11c', 'fa-flag-o' => '\f11d', 'fa-flag-checkered' => '\f11e', 'fa-terminal' => '\f120', 'fa-code' => '\f121', 'fa-reply-all' => '\f122', 'fa-star-half-o' => '\f123', 'fa-location-arrow' => '\f124', 'fa-crop' => '\f125', 'fa-code-fork' => '\f126', 'fa-chain-broken' => '\f127', 'fa-question' => '\f128', 'fa-info' => '\f129', 'fa-exclamation' => '\f12a', 'fa-superscript' => '\f12b', 'fa-subscript' => '\f12c', 'fa-eraser' => '\f12d', 'fa-puzzle-piece' => '\f12e', 'fa-microphone' => '\f130', 'fa-microphone-slash' => '\f131', 'fa-shield' => '\f132', 'fa-calendar-o' => '\f133', 'fa-fire-extinguisher' => '\f134', 'fa-rocket' => '\f135', 'fa-maxcdn' => '\f136', 'fa-chevron-circle-left' => '\f137', 'fa-chevron-circle-right' => '\f138', 'fa-chevron-circle-up' => '\f139', 'fa-chevron-circle-down' => '\f13a', 'fa-html5' => '\f13b', 'fa-css3' => '\f13c', 'fa-anchor' => '\f13d', 'fa-unlock-alt' => '\f13e', 'fa-bullseye' => '\f140', 'fa-ellipsis-h' => '\f141', 'fa-ellipsis-v' => '\f142', 'fa-rss-square' => '\f143', 'fa-play-circle' => '\f144', 'fa-ticket' => '\f145', 'fa-minus-square' => '\f146', 'fa-minus-square-o' => '\f147', 'fa-level-up' => '\f148', 'fa-level-down' => '\f149', 'fa-check-square' => '\f14a', 'fa-pencil-square' => '\f14b', 'fa-external-link-square' => '\f14c', 'fa-share-square' => '\f14d', 'fa-compass' => '\f14e', 'fa-caret-square-o-down' => '\f150', 'fa-caret-square-o-up' => '\f151', 'fa-caret-square-o-right' => '\f152', 'fa-eur' => '\f153', 'fa-gbp' => '\f154', 'fa-usd' => '\f155', 'fa-inr' => '\f156', 'fa-jpy' => '\f157', 'fa-rub' => '\f158', 'fa-krw' => '\f159', 'fa-btc' => '\f15a', 'fa-file' => '\f15b', 'fa-file-text' => '\f15c', 'fa-sort-alpha-asc' => '\f15d', 'fa-sort-alpha-desc' => '\f15e', 'fa-sort-amount-asc' => '\f160', 'fa-sort-amount-desc' => '\f161', 'fa-sort-numeric-asc' => '\f162', 'fa-sort-numeric-desc' => '\f163', 'fa-thumbs-up' => '\f164', 'fa-thumbs-down' => '\f165', 'fa-youtube-square' => '\f166', 'fa-youtube' => '\f167', 'fa-xing' => '\f168', 'fa-xing-square' => '\f169', 'fa-youtube-play' => '\f16a', 'fa-dropbox' => '\f16b', 'fa-stack-overflow' => '\f16c', 'fa-instagram' => '\f16d', 'fa-flickr' => '\f16e', 'fa-adn' => '\f170', 'fa-bitbucket' => '\f171', 'fa-bitbucket-square' => '\f172', 'fa-tumblr' => '\f173', 'fa-tumblr-square' => '\f174', 'fa-long-arrow-down' => '\f175', 'fa-long-arrow-up' => '\f176', 'fa-long-arrow-left' => '\f177', 'fa-long-arrow-right' => '\f178', 'fa-apple' => '\f179', 'fa-windows' => '\f17a', 'fa-android' => '\f17b', 'fa-linux' => '\f17c', 'fa-dribbble' => '\f17d', 'fa-skype' => '\f17e', 'fa-foursquare' => '\f180', 'fa-trello' => '\f181', 'fa-female' => '\f182', 'fa-male' => '\f183', 'fa-gittip' => '\f184', 'fa-sun-o' => '\f185', 'fa-moon-o' => '\f186', 'fa-archive' => '\f187', 'fa-bug' => '\f188', 'fa-vk' => '\f189', 'fa-weibo' => '\f18a', 'fa-renren' => '\f18b', 'fa-pagelines' => '\f18c', 'fa-stack-exchange' => '\f18d', 'fa-arrow-circle-o-right' => '\f18e', 'fa-arrow-circle-o-left' => '\f190', 'fa-caret-square-o-left' => '\f191', 'fa-dot-circle-o' => '\f192', 'fa-wheelchair' => '\f193', 'fa-vimeo-square' => '\f194', 'fa-try' => '\f195', 'fa-plus-square-o' => '\f196', 'fa-space-shuttle' => '\f197', 'fa-slack' => '\f198', 'fa-envelope-square' => '\f199', 'fa-wordpress' => '\f19a', 'fa-openid' => '\f19b', 'fa-university' => '\f19c', 'fa-graduation-cap' => '\f19d', 'fa-yahoo' => '\f19e', 'fa-google' => '\f1a0', 'fa-reddit' => '\f1a1', 'fa-reddit-square' => '\f1a2', 'fa-stumbleupon-circle' => '\f1a3', 'fa-stumbleupon' => '\f1a4', 'fa-delicious' => '\f1a5', 'fa-digg' => '\f1a6', 'fa-pied-piper' => '\f1a7', 'fa-pied-piper-alt' => '\f1a8', 'fa-drupal' => '\f1a9', 'fa-joomla' => '\f1aa', 'fa-language' => '\f1ab', 'fa-fax' => '\f1ac', 'fa-building' => '\f1ad', 'fa-child' => '\f1ae', 'fa-paw' => '\f1b0', 'fa-spoon' => '\f1b1', 'fa-cube' => '\f1b2', 'fa-cubes' => '\f1b3', 'fa-behance' => '\f1b4', 'fa-behance-square' => '\f1b5', 'fa-steam' => '\f1b6', 'fa-steam-square' => '\f1b7', 'fa-recycle' => '\f1b8', 'fa-car' => '\f1b9', 'fa-taxi' => '\f1ba', 'fa-tree' => '\f1bb', 'fa-spotify' => '\f1bc', 'fa-deviantart' => '\f1bd', 'fa-soundcloud' => '\f1be', 'fa-database' => '\f1c0', 'fa-file-pdf-o' => '\f1c1', 'fa-file-word-o' => '\f1c2', 'fa-file-excel-o' => '\f1c3', 'fa-file-powerpoint-o' => '\f1c4', 'fa-file-image-o' => '\f1c5', 'fa-file-archive-o' => '\f1c6', 'fa-file-audio-o' => '\f1c7', 'fa-file-video-o' => '\f1c8', 'fa-file-code-o' => '\f1c9', 'fa-vine' => '\f1ca', 'fa-codepen' => '\f1cb', 'fa-jsfiddle' => '\f1cc', 'fa-life-ring' => '\f1cd', 'fa-circle-o-notch' => '\f1ce', 'fa-rebel' => '\f1d0', 'fa-empire' => '\f1d1', 'fa-git-square' => '\f1d2', 'fa-git' => '\f1d3', 'fa-hacker-news' => '\f1d4', 'fa-tencent-weibo' => '\f1d5', 'fa-qq' => '\f1d6', 'fa-weixin' => '\f1d7', 'fa-paper-plane' => '\f1d8', 'fa-paper-plane-o' => '\f1d9', 'fa-history' => '\f1da', 'fa-circle-thin' => '\f1db', 'fa-header' => '\f1dc', 'fa-paragraph' => '\f1dd', 'fa-sliders' => '\f1de', 'fa-share-alt' => '\f1e0', 'fa-share-alt-square' => '\f1e1', 'fa-bomb' => '\f1e2' );
            $html.='<div class="field_icon_selector_ul_container">';
            $html.= '<div class="search_icon">';
            $html.= '<input type="text" autocomplete="off" name="search" value="" class="filter" placeholder="Type to Find Your Icon..." autofocus />';
            $html.= '<div class="filter-count">Founded icon: </div>';
            $html.= '</div>';
            $html.='<ul class="cornita-font-awesome field_icon_selector_ul">';
            $icons = '';
            foreach ($font_awesome_icons as $key => $v) {
                $icons.='<li><input type="radio" id="'.$key.'-'.$this->field['id'].'" name="'.$this->field['name'].'_icon" value="'.$key.'" '.checked($Selected_icon,$key,false).'><label for="'.$key.'-'.$this->field['id'].'"><i class="fa '.$key.'"></i></label><span>'.$key.'</span></li>';
            }
            $html.=$icons;
            $html.='</ul></div>';
            echo $html;
            echo '<a href="#" class="button field_icon_selector_button">Select Icon</a>';
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