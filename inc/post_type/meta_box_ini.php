<?php
function slides_add_meta_box() {

	$screens = array( 'slider');

	foreach ( $screens as $screen ) {

		add_meta_box(
			'slider_metabox',
			__( 'Image slides', 'cornita' ),
			'slides_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'slides_add_meta_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function slides_meta_box_callback( $post ) {

	wp_enqueue_script( 'wp-uploader', get_template_directory_uri() . '/assets/admin/js/wp-uploader.js', array(), '1.0.0', true );
	wp_enqueue_script( 'cornita_slides', get_template_directory_uri() . '/assets/admin/js/slides.js', array(), '1.0.0', true );
	wp_enqueue_media();
	wp_enqueue_script('jquery-ui-core');
	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'slides_meta_box', 'slides_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$slides = get_post_meta( $post->ID, '_cornita_slides',true);


	echo '<div id="slide_fields">';
	$i=0;
		echo '
		<table class="mb-table-container widefat not-sortable cornita_table">
	    <thead>
	        <tr>
	            <th class="cornita-content">Content</th>
	            <th class="cornita-delete">Delete</th>
	        </tr>
	    </thead>
	    <tbody id="sortable">';
	if ($slides) {
		foreach ($slides as $index =>$slide ) {
			$image_id=$slide['img'];
			$thumb = wp_get_attachment_image_src( $image_id, 'thumbnail' );
			echo '
		        <tr>
		            <td class="cornita-content" vertical-align="center">
		                <ul>
		                    <li class="row-images" data-type="upload"><strong>Image: </strong>
		                        <div class="upload-field-details">
		                            <a href="'. wp_get_attachment_url( $image_id ).'" target="_blank" class="cornita-attachment-link">
		                                <img width="60" height="60" src="'.$thumb['0'].'">
		                            </a>
		                            <p class="description">
			                            <span class="file-name">'.get_the_title( $image_id ).'</span>
			                            <span class="file-type">'.get_post_mime_type( $image_id ).'</span>
		                            </p>
		                            <p class="upload_btn">
										<input type="text" id="slide_field" name="img[]" value="' . esc_attr( $slide[img] ) . '" size="25" />
		            					<a href="#" class="uploader button-secondary">Edit</a>
		            				</p>
		                        </div>
		                    </li>
						</ul>
						<p><label>Title:</label> <input type="text" name="title[]" value="'.$slide["title"].'"></p>
						<p><label>Url:</label> <input type="text" name="url[]" value="'.$slide["url"].'"></p>
						<p><label>Caption Effect:</label>
						<select name="effect[]" value="">
							<option value="moveFromLeft" '.(selected($slide["effect"], "moveFromLeft", false)).'> Move From Left </option>
							<option value="moveFomRight" '.(selected($slide["effect"], "moveFomRight", false)).'> Move Fom Right</option>
							<option value="moveFromTop" '.(selected($slide["effect"], "moveFromTop", false)).'> Move From Top</option>
							<option value="moveFromBottom" '.(selected($slide["effect"], "moveFromBottom", false)).'> Move From Bottom</option>
							<option value="fadeIn" '.(selected($slide["effect"], "fadeIn", false)).'> Fade In</option>
							<option value="fadeFromLeft" '.(selected($slide["effect"], "fadeFromLeft", false)).'> Fade From Left</option>
							<option value="fadeFromRight" '.(selected($slide["effect"], "fadeFromRight", false)).'> Fade From Right</option>
							<option value="fadeFromTop" '.(selected($slide["effect"], "fadeFromTop", false)).'> Fade From Top</option>
							<option value="fadeFromBottom" '.(selected($slide["effect"], "fadeFromBottom", false)).'> Fade From Bottom</option>
						</select>
						</p>
		            </td>
		            <td class="cornita-delete">';
		            if ($index==0) {
		            	echo "Delete";
		            } else {
		            	echo '<a href="#" class="mbdelete delete_field">Delete</a>';
		            }
		            echo '</td></tr>';

			echo '';
			$i++;
		}
	} else {
		echo '<tr>
    <td class="cornita-content" vertical-align="center">
        <ul>
            <li class="row-images" data-type="upload"><strong>Image: </strong>
                <div class="upload-field-details">
                    <a href="" target="_blank" class="cornita-attachment-link"></a>
                    <p class="description"></p>
                    <p>
				        <input type="text" id="slide_field" name="img[]" value="" size="25" />
				        <button class="button uploader">Upload</button>
    				</p>
                </div>
            </li>
        </ul>
        <p><label>Title:</label> <input type="text" name="title[]"></p>
        <p><label>Url:</label> <input type="text" name="url[]"></p>
		<p><label>Caption Effect:</label>
		<select name="effect[]" value="">
			<option value="moveFromLeft" '.(selected($slide["effect"], "moveFromLeft", false)).'> Move From Left </option>
			<option value="moveFomRight" '.(selected($slide["effect"], "moveFomRight", false)).'> Move Fom Right</option>
			<option value="moveFromTop" '.(selected($slide["effect"], "moveFromTop", false)).'> Move From Top</option>
			<option value="moveFromBottom" '.(selected($slide["effect"], "moveFromBottom", false)).'> Move From Bottom</option>
			<option value="fadeIn" '.(selected($slide["effect"], "fadeIn", false)).'> Fade In</option>
			<option value="fadeFromLeft" '.(selected($slide["effect"], "fadeFromLeft", false)).'> Fade From Left</option>
			<option value="fadeFromRight" '.(selected($slide["effect"], "fadeFromRight", false)).'> Fade From Right</option>
			<option value="fadeFromTop" '.(selected($slide["effect"], "fadeFromTop", false)).'> Fade From Top</option>
			<option value="fadeFromBottom" '.(selected($slide["effect"], "fadeFromBottom", false)).'> Fade From Bottom</option>
		</select>
		</p>
    </td>
    <td class="cornita-delete">Delete</td>
</tr>
	';
	}
	echo '</tbody></table>';

	echo '</div>';
	echo '<p><a href="#" id="add_slide" class="button-primary" ><span>Add Slide</span></a></p>';
}



function myplugin_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['slides_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['slides_meta_box_nonce'], 'slides_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	// if ( ! isset( $_POST['img'] ) ) {
	// 	return;
	// }

	// Sanitize user input.

	// Update the meta field in the database.

    $slides=array();

	foreach ($_POST['img'] as $index => $v) {

		if(!empty($v) && !empty($_POST['title'][$index]) && !empty($_POST['effect'][$index]) && !empty($_POST['url'][$index])){


			$slides[]=array('img'=>$v,'title'=>$_POST['title'][$index],'effect'=>$_POST['effect'][$index],'url'=>$_POST['url'][$index]);

		}

	}


	update_post_meta( $post_id, '_cornita_slides',$slides );
	// update_post_meta( $post_id, 'test2', $test2 );
}
add_action( 'save_post', 'myplugin_save_meta_box_data' );
