(function($) {

	$(document).on('click','a.button.field_icon_selector_button',function(event){
		event.preventDefault();
		$(this).prev().fadeIn();
		$(this).prev().find('.filter').focus();
        var number = $(this).prev().find('.field_icon_selector_ul li').size();
        var text = $(".filter-count").data('text');
        $(".filter-count").text(text+number);
	});

	$(document).on('click','a.close_icon_selector ',function(event){
		$(this).parent().fadeOut();
	});

	$(document).on('click', 'ul.field_icon_selector_ul li input', function(event) {
		var icon_selected = $(this).val();
		$(this).parents('.field_icon_selector_ul_container').find('.filter-selected-icon .display-icon').html('<i class="fa '+icon_selected+'"></i>');
        $(this).parents('.field_icon_selector_ul_container').find('.filter-selected-icon .use_icon input').val(icon_selected);
	});

	$(document).on('click', '.use_icon', function(event) {
		var icon_selected = $(this).find('input').val();
		$(this).parents('.field_icon_selector_ul_container').next().next().html('<i class="fa '+icon_selected+'"></i>');
		$(this).parents('.field_icon_selector_ul_container').next().next().next().val(icon_selected);
        $(this).parents('.field_icon_selector_ul_container').fadeOut();
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
        var text = $(".filter-count").data('text');
        $(".filter-count").text(text+count);
    });


})(jQuery);
