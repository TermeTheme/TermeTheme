<?php
abstract class Terme_Page_Builder_Element {
    abstract public function get_empty_fields();
    abstract public function get_filled_fields();
    abstract public function get_dashboard_output();
    abstract public function get_frontend_output();
    // abstract public static function get_args();
}
