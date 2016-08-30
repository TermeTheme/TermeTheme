(function($){
       
        var custom_uploader;
    
    $(document).on('click','.uploader',function(e) {
        
        e.preventDefault();
        
        $this=$(this);
        
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) 
        {
            custom_uploader.open();
            return;
        }
 
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Select Image',
            button: {
                text: 'Select Image'
            },
            multiple: false
        });

 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            
            attachment = custom_uploader.state().get('selection').first().toJSON();
            // console.log(attachment);
            $this.prev().val(attachment.id);
            $this.parent().parent().find('a.cornita-attachment-link').attr('href', attachment.url);
            $this.parent().parent().find('a.cornita-attachment-link').html('<img width="60" height="60" src="'+attachment.sizes.thumbnail.url+'">')
            $this.parent().prev('p.description').html('<span class="file-name">'+attachment.title+'</span><span class="file-type">'+attachment.mime+'</span>');
        });
 
        //Open the uploader dialog
        custom_uploader.open();
        
 
    });  
    


       
       
       
   })(jQuery);
   
