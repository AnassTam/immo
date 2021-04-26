$('#ajax-properties').click(function(){
    $.get('/property.json').then(function(properties){
        console.log(properties);

    });
});

$('#real_estate_surface').on('input',function(){
    $('#result').remove();
    $(this).after('<div id="result">'+$(this).val()+' m²</div>');

});