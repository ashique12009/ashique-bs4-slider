jQuery(function($){
    // Slider image uploader
    var preview_image = $('#image_preview');
    var slide_image = $('#slide_image');

    if (preview_image.attr('src') === "") {
        preview_image.hide();
    }

    image_uploader();

    function image_uploader() {
        $('#select_image').click(function() {
            var images = wp.media({
                title: 'Upload Image',
                multiple: false
            }).open().on('select', function(e){
                var uploadedImage = images.state().get('selection');
                var file = uploadedImage.toJSON();
                
                if (file[0].type == 'image') {
                    preview_image.attr('src', file[0].url);
                    preview_image.show();
                    slide_image.val(file[0].id);
                }
            });
        });
    }
});