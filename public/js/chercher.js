$('#search').keyup(function(){
    // on saisie le mot à chercher
    let value =$(this).val();

    $.ajax('/api/search/'+value, {type: 'GET'}).then(function(response) {
        console.log(response);

        $('#real-estate-list').html(response.html);
    });



})