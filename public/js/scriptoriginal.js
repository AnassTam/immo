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
$('[type="file"]').on('change', function(file){

    var label=$(this).val().split('\\').pop();// pop() .pour recuperer la derniere valeur du tableau
    $(this).next().text(label);

    let reader = new FileReader();  //afficher l 'image generer par  l'utilisateur

    reader.addEventListener('load', function(file){
        $('.custom-file img').remove();
        let base64 = file.target.result;
        let img =$('<img class="img-fluid mt-5" width="250"/>');
        img.attr('src', base64);
        $('.custom-file').prepend(img);

    })
    reader.readAsDataURL(this.files[0]);
});
