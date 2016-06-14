(function($) {

	$(document).on('click','a.button.field_icon_selector_button',function(event){
		event.preventDefault();
		$(this).prev().fadeIn();
		$(this).prev().find('.filter').focus();
	});

	$(document).on('click','.field_icon_selector_ul_container',function(event){
		$(this).fadeOut();
	});

	$(document).on('click', 'ul.field_icon_selector_ul li input', function(event) {
		var icon_selected = $(this).val();
		$(this).parent().parent().parent().next().next().html('<i class="fa '+icon_selected+'"></i>');
		$(this).parent().parent().parent().next().next().next().val(icon_selected);
	});

    $(".filter").keyup(function(){

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
 		
        // Loop through the comment list
        $(this).parent().next().children().each(function(){
 
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
 
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                count++;
            }
        });
 
        // Update the count
        var numberItems = count;
        $(".filter-count").text("Founded icon:  = "+count);
    });


})(jQuery);	

