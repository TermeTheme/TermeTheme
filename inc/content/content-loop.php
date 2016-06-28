        <?php
            if(have_posts()) : while(have_posts()) : the_post();
            $terme_pb_status = get_post_meta( get_the_ID(), '_terme_pb_status', true );
            if ($terme_pb_status=='true') {
                $terme_pb = get_post_meta( get_the_ID(), '_terme_pb', true );
                // print_r($terme_pb);
                $page_builder_output = '';
                foreach ($terme_pb as $key => $element) {
                    $args = $element['class_name']::get_args();
                    $passed_array = array();
                    foreach ($args as $arg) {
                        $passed_array[$arg] = $element['fields'][$arg];
                    }
                    $el_object = new $element['class_name']($id, $passed_array);
                    echo $el_object->get_frontend_output();
                }
            }
              endwhile; else:
              endif;
        ?>
