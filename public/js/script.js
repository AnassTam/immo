$('#ajax-properties').click(function(){
    $.get('/property.json').then(function(properties){
        console.log(properties);

    });
});


$('#real_estate_surface').on('input',function(){
    $('#result').remove();
    $(this).after('<div id="result">'+$(this).val()+' m²</div>');

});

$('#real_estate_surface').on('input',function (){
    $('#result').remove()
    $(this).after('<div id ="result">' +$(this).val()+'m2</div>')
})

// Affichage de l'image
$(function() {
    // Multiple images preview in browser
    $('#real_estate_imagesSupp').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
    $('#real_estate_documentsVendeurs').on('change', function() {
        imagesPreview(this, 'div.gallery2');
    });
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {

                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr({
                        'src': event.target.result,
                        'style':' width:300px; height: 230px'
                    }).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };



});
