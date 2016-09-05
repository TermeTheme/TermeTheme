<table class="widefat">
    <tbody>
        <tr>
            <th><?php _e('Slider Type:', 'terme') ?></th>
            <td>
                <?php
                    // $type = ;
                    $type = ( isset($slider['settings']['type']) && !empty($slider['settings']['type']) ) ? $slider['settings']['type'] : 'custom' ;
                ?>
                <select class="terme_slider_type" name="slider[settings][type]">
                    <option value="custom" <?php selected( $type, 'custom' ) ?>><?php _e('Custom', 'terme') ?></option>
                    <option value="category" <?php selected( $type, 'category' ) ?>><?php _e('Category', 'terme') ?></option>
                </select>
            </td>
        </tr>
    </tbody>
</table>




<div id="slider_custom" class="terme_slider_fieldset" <?php if($type=='custom') { echo 'style="display: block"'; } ?>>
    <?php $i=0; ?>
	<table class="mb-table-container widefat not-sortable terme_slides_table striped widefat">
    <thead>
        <tr>
            <th class="cornita-content">&nbsp;</th>
            <th class="cornita-content"><?php _e('Slide', 'terme') ?></th>
            <th class="terme-delete"><?php _e('Delete', 'terme') ?></th>
        </tr>
    </thead>
    <tbody id="sortable">
        <?php
        $slides = ( isset($slider['slides']) && !empty($slider['slides']) ) ? $slider['slides'] : array() ;
        if ( isset($slides) && !empty($slides) ):
            foreach ($slides as $key => $slide ):
                $image_id = $slide['img'];
                $thumb = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                $title = $slide['title'];
                $url = $slide['url'];
        ?>
            <tr class="terme_slider_element">
                <td class="check-column"><span class="dashicons dashicons-editor-expand"></span></td>
                <td vertical-align="center">
                    <table class="">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="upload-field-details">
                                        <a href="" target="_blank" class="cornita-attachment-link"><img width="60" height="60" src="<?php echo $thumb['0'] ?>"></a>
                                        <p class="description">
                                            <span class="file-name"><?php echo get_the_title( $image_id ) ?></span>
                                            <span class="file-type"><?php echo get_post_mime_type( $image_id ) ?></span>
                                        </p>
                                        <p>
                                            <input type="hidden" id="slide_field" name="slider[slides][<?php echo $key ?>][img]" value="<?php echo $image_id ?>">
                                            <button class="button uploader"><?php _e('Upload', 'terme') ?></button>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><label><?php _e('Slide Title:', 'terme') ?></label></th>
                                <td><input type="text" name="slider[slides][<?php echo $key ?>][title]" value="<?php echo $title ?>"></td>
                            </tr>
                            <tr>
                                <th><label><?php _e('Slide Url:', 'terme') ?></label></th>
                                <td><input type="text" name="slider[slides][<?php echo $key ?>][url]" value="<?php echo $url ?>"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="terme-delete">
                    <?php
                        if ($key==0) {
                            _e('Delete', 'terme');
                        } else {
                            echo '<a href="#" class="mbdelete terme_delete_slide">'.__('Delete', 'terme').'</a>';
                        }
                    ?>
                </td>
            </tr>
    	<?php endforeach; ?>
        <?php else: ?>
            <tr class="terme_slider_element">
                <td class="check-column"><span class="dashicons dashicons-editor-expand"></span></td>
                <td vertical-align="center">
                    <table class="">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <div class="upload-field-details">
                                        <a href="" target="_blank" class="cornita-attachment-link"></a>
                                        <p class="description"></p>
                                        <p>
                                            <input type="hidden" id="slide_field" name="slider[slides][0][img]" value="">
                                            <button class="button uploader"><?php _e('Upload', 'terme') ?></button>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><label><?php _e('Slide Title:', 'terme') ?></label></th>
                                <td><input type="text" name="slider[slides][0][title]"></td>
                            </tr>
                            <tr>
                                <th><label><?php _e('Slide Url:', 'terme') ?></label></th>
                                <td><input type="text" name="slider[slides][0][url]"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="terme-delete"><?php _e('Delete', 'terme') ?></td>
            </tr>
        <?php endif; ?>



    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                <a href="#" id="add_slide" class="button-primary" ><span><?php _e('Add Slide', 'terme') ?></span></a>
            </td>
        </tr>
    </tfoot>
</table>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        jQuery(document).on('click','#add_slide',function(event){
            event.preventDefault();
            var counter = jQuery(this).parents('table.terme_slides_table').find('tbody tr.terme_slider_element').size();
            var html =
            '<tr class="terme_slider_element">'+
                '<td class="check-column"><span class="dashicons dashicons-editor-expand"></span></td>'+
                '<td vertical-align="center">'+
                    '<table class="">'+
                        '<tbody>'+
                            '<tr>'+
                                '<td colspan="2">'+
                                    '<div class="upload-field-details">'+
                                        '<a href="" target="_blank" class="cornita-attachment-link"></a>'+
                                        '<p class="description"></p>'+
                                        '<p>'+
                                            '<input type="hidden" id="slide_field" name="slider[slides]['+counter+'][img]" value="">'+
                                            '<button class="button uploader"><?php _e('Upload', 'terme') ?></button>'+
                                        '</p>'+
                                    '</div>'+
                                '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<th><label><?php _e('Slide Title:', 'terme') ?></label></th>'+
                                '<td><input type="text" name="slider[slides]['+counter+'][title]"></td>'+
                            '</tr>'+
                            '<tr>'+
                                '<th><label><?php _e('Slide Url:', 'terme') ?></label></th>'+
                                '<td><input type="text" name="slider[slides]['+counter+'][url]"></td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'+
                '</td>'+
                '<td class="terme-delete"><a href="#" class="mbdelete terme_delete_slide"><?php _e('Delete', 'terme') ?></a></td>'+
            '</tr>';
            jQuery(this).parents('table.terme_slides_table').find('tbody#sortable').append(html)

        });
    });
</script>
</div>

<div class="terme_slider_fieldset" id="slider_category" <?php if($type=='category') { echo 'style="display: block"'; } ?>>
    <table class="mb-table-container widefat not-sortable terme_slides_table striped widefat">
        <tbody>
            <tr>
                <th><?php _e('Categories:', 'terme') ?></th>
                <td>
                    <select class="terme_select2 slider_category_selector" name="slider[settings][cats][]" multiple="multiple">
                        <?php
                            $args = array(
                                'hide_empty' => true,
                            );
                            $categories  = get_categories( $args );
                            $selected_cats = (isset($slider['settings']['cats']) && !empty($slider['settings']['cats'])) ? $slider['settings']['cats'] : array() ;
                            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                                foreach ($categories as $key => $category) {
                                    $selected = (in_array($category->term_id, $selected_cats)) ? 'selected="selected"' : '';
                                    echo '<option value="'.$category->term_id.'" '.$selected.'>'.$category->name.'</option>';
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><?php _e('Number of slides:', 'terme') ?></th>
                <td><input type="Number" step="1" min="0" name="slider[settings][number]" value="<?php echo ( isset($slider['settings']['number']) && !empty($slider['settings']['number']) ) ? $slider['settings']['number'] : '' ?>"></td>
            </tr>
        </tbody>
    </table>
</div><!-- slider_category -->
