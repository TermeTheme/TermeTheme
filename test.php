<?php
/* template name: Test */
global $terme_options
?>
<pre>

<?php




function pippin_show_fruits() {
	$fruits = array(
		'apples',
		'oranges',
	);
	$list = '<ul>';

	if(has_filter('pippin_add_fruits')) {
		$fruits = apply_filters('pippin_add_fruits', $fruits);
	}

	foreach($fruits as $fruit) :
		$list .= '<li>' . $fruit . '</li>';
	endforeach;

	$list .= '</ul>';

	return $list;
}

function pippin_add_extra_fruits($fruits) {
	// the $fruits parameter is an array of all fruits from the pippin_show_fruits() function

	$extra_fruits = array(
		'plums',
		'kiwis',
		'tangerines',
		'pepino melons'
	);

	// combine the two arrays
	$fruits = array_merge($extra_fruits, $fruits);

	return $fruits;
}
add_filter('pippin_add_fruits', 'pippin_add_extra_fruits');
echo pippin_show_fruits();
