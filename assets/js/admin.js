var uploadSrc = '',
    uploadID = '',
    uploadImg = '',
    uploadContainer = '';
jQuery(document).ready(function($) {
    jQuery(document).on('click touch', '.upload-button', function(e) {
        uploadSrc = jQuery(this).parents('td').first().find( '.upload' );
        uploadImg = jQuery(this).parents('td').first().find( 'img' );
        uploadID = jQuery(this).parents('td').first().find( '.image_id' );
        uploadContainer = jQuery(this).parents('td').first().find( '.spiny_image_block' );
        e.preventDefault();
        var image_frame;
        if(image_frame){
            image_frame.open();
        }
        // Define image_frame as wp.media object
        image_frame = wp.media({
            title: 'Select Media',
            multiple : false,
            library : {
                type : 'image',
            }
        });

        image_frame.on('close',function() {
            // On close, get selections and save to the hidden input
            // plus other AJAX stuff to refresh the image preview
            var selection =  image_frame.state().get('selection');
            var gallery_ids = new Array();
            var my_index = 0;
            var imgurl = '';
            selection.each(function(attachment) {
                imgurl = attachment['attributes']['url'];

                console.log(attachment);

                gallery_ids[my_index] = attachment['id'];
                my_index++;
            });
            var ids = gallery_ids.join(",");
            uploadID.val(ids);

            uploadSrc.val( imgurl );
            uploadImg.attr('src', imgurl);
            uploadContainer.removeClass('default');
        });

        image_frame.on('open',function() {
            // On open, get the id from the hidden input
            // and select the appropiate images in the media manager
            var selection =  image_frame.state().get('selection');
            var ids = uploadID.val().split(',');
            ids.forEach(function(id) {
                var attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add( attachment ? [ attachment ] : [] );
            });

        });

        image_frame.open();
    });

    jQuery(document).on('click touch', '.spiny_image_block_close', function(e) {
        uploadSrc = jQuery(this).parents('td').first().find( '.upload' );
        uploadImg = jQuery(this).parents('td').first().find( 'img' );
        uploadID = jQuery(this).parents('td').first().find( '.image_id' );
        uploadContainer = jQuery(this).parents('td').first().find( '.spiny_image_block' );

        console.log(uploadSrc);
        console.log(uploadImg);

        uploadSrc.val(-1);
        uploadID.val(-1);
        uploadContainer.addClass('default');
        uploadImg.attr('src', uploadImg.attr('data-default'));
    });

// Ajax request to refresh the image preview

    $( 'form.ajax-form' ).submit(function() {
        $.ajax({
            data: $( this ).serialize(),
            type: "POST",
            beforeSend: function() {
                $( '.status strong' ).html( 'Saving...' );
                $( '.status' ).removeClass( 'done' );
                $( '.status' ).fadeIn();
            },
            success: function(data) {
                $( '.status' ).addClass( 'done' );
                $( '.status strong' ).html( 'Done.' );
                $( '.status' ).delay( 1000 ).fadeOut();
            }
        });
        return false;
    });
});