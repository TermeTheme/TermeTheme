<?php
/* template name: Test */
global $terme_options
?>
<pre>
    <?php

    $option = 'left';
    $layout = array(
        '0' => 'col-md-4',
        '1' => 'col-md-8',
    );

    if ($option == 'right' ) {
        $new_sort = array();
        for ($i=0; $i <= 1; $i++) {
            $new_sort[] = $layout[$i];
        }
    } else {
        $new_sort = array();
        for ($i=1; $i >= 0; $i--) {
            $new_sort[] = $layout[$i];
        }
    }

    print_r($layout);
    print_r($new_sort);
