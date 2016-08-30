(function($) {
	$add_slide=$('#add_slide');
	$slide_fields=$('#slide_fields table.cornita_table tbody');
	$delete_field=$('.delete_field');

	$(document).on('click','#add_slide',function(event){
		event.preventDefault();
		$slide_fields.append(' <tr><td class="cornita-content" vertical-align="center"> <ul> <li class="row-images" data-type="upload"><strong>Image: </strong> <div class="upload-field-details"> <a href="" target="_blank" class="cornita-attachment-link"></a> <p class="description"></p><p><input type="text" id="slide_field" name="img[]" value="" size="25"/><button class="button uploader">Upload</button></p></div></li></ul><p><label>Title:</label> <input type="text" name="title[]"></p><p><label>Url:</label> <input type="text" name="url[]"></p><p><label>Caption Effect:</label><select name="effect[]" value=""><option value="moveFromLeft"> Move From Left </option><option value="moveFomRight"> Move Fom Right</option><option value="moveFromTop"> Move From Top</option><option value="moveFromBottom"> Move From Bottom</option><option value="fadeIn"> Fade In</option><option value="fadeFromLeft"> Fade From Left</option><option value="fadeFromRight"> Fade From Right</option><option value="fadeFromTop"> Fade From Top</option><option value="fadeFromBottom"> Fade From Bottom</option></select></p></td><td class="cornita-delete"><a href="#" class="delete_field mbdelete">Delete</a> </td></tr>');
		$('#slide_fields table.cornita_table tbody').slideDown(500);
	});

	$(document).on('click','.delete_field',function(e){
		e.preventDefault();
		$(this).closest('tr').animate({
			opacity: "0",
			backgroundColor: "#ff4747"},
			500, function() {
			$(this).remove();
		});
	});
 	$( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();

})(jQuery);	