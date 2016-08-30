<?php
/* template name: Test */
global $terme_options;
get_header();
?>
<pre>
<?php
$row = '<div class="container"><div class="row">';
$content = '<div class="col-xs-9"><div style="background: #00f; height: 500px; color: #fff">Content</div></div>';
$content = get_template_part( 'content', 'single' );
$sidebar = '<div class="col-xs-3"><div style="background: #f00; height: 500px; color: #fff">Sidebar</div></div>';

if ($terme_options['theme_layout']==0) {
    $columns = array(
        $content,
        $sidebar
    );
} else {
    $columns = array(
        $sidebar,
        $content
    );
}
echo $row;
foreach ($columns as $column) {
    echo $column;
}

// class_exists('Woocommerce')
// echo $content;
// echo $sidebar;

echo "</div></div>";
