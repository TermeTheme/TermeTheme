<?php
/* template name: Test */
global $terme_options
?>
<pre>
<?php
// include TEMPLATEPATH.'/inc/libraries/php-font-lib/FontLib/Autoloader.php';
// include TEMPLATEPATH.'/inc/libraries/php-font-lib/vendor/autoload.php';
// use FontLib\Font;
$font_path = TEMPLATEPATH.'/assets/css/font-awesome.min.css';
$css_File = file_get_contents($font_path);
$pattern_two = "/\.fa-[\w-]+:before\s*?/";
preg_match_all($pattern_two, $css_File, $matches);
$classes = array();
foreach ($matches['0'] as $key => $class) {
    $class = str_replace(":before","",$class);
    $class = str_replace(".fa-","fa-",$class);
    $classes[] = $class;
}
echo '<pre>';
print_r($matches['0']);
echo '</pre>';
