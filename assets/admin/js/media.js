jQuery(document).ready(function($) {
  jQuery(document).on('click', '.upload_image_button', function(e) {
    e.preventDefault();
    var key = jQuery(this);
    var image = wp.media({
        title: 'Upload Image',
        // mutiple: true if you want to upload multiple files at once
        multiple: false
    }).open()
    .on('select', function(e){
        var uploaded_image = image.state().get('selection').first();
        var imgInfo = uploaded_image.toJSON();
        console.log(imgInfo);
        console.log(imgInfo.id);
        var thumbImg = '<img src="'+imgInfo.sizes.thumbnail.url+'">';
        key.parent().find('.terme_ads_widget_thumb').html('').append(thumbImg);
        key.parent().find('.ads_widget_img_id').val(imgInfo.id);
    });
});
});
