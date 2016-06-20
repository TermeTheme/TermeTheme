jQuery(document).ready(function($) {

    jQuery(document).on('click', 'a.terme_add_page_builder_button', function(event) {
        event.preventDefault();
        jQuery('#postdivrich, .terme_page_builder_container').toggle();
    });


    jQuery( ".terme_pb_content_container ul" ).droppable({
      drop: function( event, ui ) {
        accept: '.terme_pb_elements_container ul li',
        jQuery(ui.draggable).css({
            width: '100%',
            height: 'auto'
        }).appendTo(jQuery(this).find('ul'));
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
        // appendTo: '.terme_pb_content_container ul',
    });

    jQuery(document).on('click', '.terme_pb_content_container a.terme_pb_item_toggle', function(event) {
        event.preventDefault();
        jQuery(this).next().slideToggle(300);
    });

    jQuery(document).on('click', '.terme_pb_content_container a.terme_pb_delete_element', function(event) {
        event.preventDefault();
        jQuery(this).parent().parent().remove();
    });


});
