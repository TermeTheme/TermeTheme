jQuery(document).ready(function($) {

    jQuery('select.terme_select2').select2();

    // Page Builder
    jQuery(document).on('click', 'a.terme_add_page_builder_button', function(event) {
        event.preventDefault();
        jQuery('#postdivrich, .terme_page_builder_container').toggle();

        var terme_pb_status = jQuery('#terme_pb_status'),
        status = terme_pb_status.val();
        terme_pb_status.val(status === "true" ? "false" : "true");

    });

    jQuery( ".terme_pb_content_container ul" ).droppable({
      drop: function( event, ui ) {
        accept: '.terme_pb_elements_container ul li';

        var thisId = jQuery(ui.draggable).data('id');
        var count = (jQuery('.terme_pb_content_container>ul>li').size())-1;
        var thisHtml = jQuery(ui.draggable).html();
        var regex = new RegExp('\[fields\]\[.\]', "g");
        var thisHtml = thisHtml.replace(/terme_pb\[.\]/g, 'terme_pb['+count+']');

        jQuery(ui.draggable).find('*[data-name]').each(function(index, el) {
            var currentName = jQuery(this).attr('data-name');
            var newName = currentName.replace(/terme_pb\[.\]/g, 'terme_pb['+count+']');
            jQuery(this).attr('name', newName);
        });

        jQuery(ui.draggable).css({
            width: '100%',
            height: 'auto'
        }).appendTo(jQuery(this));

      }
    }).sortable({
        placeholder: "terme-sortable-placeholder",
        sort: function () {
            jQuery(this).removeClass("ui-state-default");
        }
    });

    jQuery( ".terme_pb_elements_container ul li" ).draggable({
        cursor: 'move',
        helper: 'clone',
        scroll: false,
        connectToSortable: '.terme_pb_content_container ul',
    });

    jQuery(document).on('click', '.terme_pb_content_container a.terme_pb_item_toggle', function(event) {
        event.preventDefault();
        jQuery(this).next().slideToggle(300);
    });

    jQuery(document).on('click', '.terme_pb_content_container a.terme_pb_delete_element', function(event) {
        event.preventDefault();
        jQuery(this).parent().parent().remove();
    });

    // Terme Socials Widget
    jQuery(document).on('change', 'ul.terme_social_widgets li .network_status', function(event) {
        event.preventDefault();
        jQuery(this).parent().find('ul').slideToggle('300');
    });

});
