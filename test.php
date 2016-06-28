<?php
/* template name: Test */
global $terme_options
?>
<pre>
    <?php

    $mojtaba = get_option( 'mojtaba' );
    $fields = get_post_meta( 62, 'terme_pb', true );
    print_r($fields);
