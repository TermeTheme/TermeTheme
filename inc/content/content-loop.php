<?php
$terme_pb_status = get_post_meta( get_the_ID(), 'terme_pb_status', true );
if ($terme_pb_status=='true') {
    $terme_pb = get_post_meta( get_the_ID(), 'terme_pb', true );
    // print_r($terme_pb);
    $page_builder_output = '';
    foreach ($terme_pb as $key => $element) {
        foreach ($element['fields'] as $id => $field) {
            $el_object = new $element['class_name']($id, $field['title'], $field['subtitle'], $field['number'], $field['category']);
            // $el_object->set_fields_value('1','2','3');
            // echo $el_object->test();
            // print_r($el_object);
            $page_builder_output .= $el_object->get_frontend_output();
        }
    }
}
?>
