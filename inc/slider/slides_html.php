<div id="slide_fields">
    <?php $i=0; ?>
	<table class="mb-table-container widefat not-sortable">
    <thead>
        <tr>
            <th class="cornita-content">Content</th>
            <th class="cornita-delete">Delete</th>
        </tr>
    </thead>
    <tbody id="sortable">
        <?php
        if ($slides):
            foreach ($slides as $index =>$slide ):
                $image_id=$slide['img'];
                $thumb = wp_get_attachment_image_src( $image_id, 'thumbnail' );

        ?>
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
                <td class="cornita-delete">
                <?php
                    if ($index==0) {
                        echo "Delete";
                    } else {
                        echo '<a href="#" class="mbdelete delete_field">Delete</a>';
                    }
                ?>

                </td></tr>

    			<?php $i++; endforeach; ?>
        <?php else: ?>
            <tr>
                <td vertical-align="center">
                    <table class="">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="upload-field-details">
                                        <a href="" target="_blank" class="cornita-attachment-link"></a>
                                        <p class="description"></p>
                                        <p>
                                            <input type="hidden" id="slide_field" name="slide[0][img]" value="">
                                            <button class="button uploader">Upload</button>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><label>Title:</label></th>
                                <td><input type="text" name="slide[0][img]"></td>
                            </tr>
                            <tr>
                                <th><label>Url:</label></th>
                                <td><input type="text" name="url[]"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="cornita-delete">Delete</td>
            </tr>
        <?php endif; ?>
    </tbody></table>
</div>
<p><a href="#" id="add_slide" class="button-primary" ><span>Add Slide</span></a></p>
