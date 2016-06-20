<?php
function terme_page_builder_elements() {
    $path    = dirname( __FILE__ ) . '/elements/';
        $folders = scandir( $path, 1 );
        return $folders;
}
