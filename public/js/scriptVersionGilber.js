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

let selectedFiles = [];

let images = "";
let isLoaded = false;
let gallery = "";


let output = "";
/*for(let j = 0; j < selectedFiles.length; j++) {

}*/

if(isLoaded) {
    console.log("GALLERY CONTENT:" + gallery);
} else {
    console.log("LOAD GALLERY.......");
}

console.log("GALLERY CONTENT002:" + gallery);

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


        //console.log("IMAGES VALUE: " + images);

        //gallery = `<div>${images}</div>`
        if (input.files) {

            isLoaded = true;

            let filesAmount = input.files.length;

            for (let i = 0; i < filesAmount; i++) {

                let reader = new FileReader();

                reader.onload = function(event) {

                    //let gallery = "";
                    $($.parseHTML('<img class="demo">')).attr({
                        'src': event.target.result,
                        'style':' width:300px; height: 230px',
                        'id':"bien" + i
                    }).appendTo(placeToInsertImagePreview);

                    //console.log(`IMAGE ${i}:  ${event.target.result}`);
                    selectedFiles[i] = event.target.result;

                    images +=`<img src="${event.target.result}" id="img${i}" class="image-bien">`;

                    console.log("OUTPUT IMAGES 000 :" + images);


                    gallery = `<div>${images}</div>`;

                    console.log("GALLERY CONTENT :" + gallery);

                    $(gallery).appendTo(".gallery3")
                }

                console.log("OUTPUT IMAGES :" + images);


                reader.readAsDataURL(input.files[i]);
            }
        }

    };



});
