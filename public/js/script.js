$(document).ready(function(){

    //Crafted timepicker
    for (i = 0; i < 24; i++) {
        if (i < 10) {
            i = '0' + i;
        }
        $("#start,#finish").append('<option>' + i + ':00' + '</option>');
        $("#start,#finish").append('<option>' + i + ':30' + '</option>');
    }

    /*$.get('/parts', function(data){

        $.each(data, function(key, val){
            //$("#parts").append('<div>' + val.id + ' ' + val.name + ' ' + val.description + ' ' + val.start + ' ' + val.finish + '</div>');
        });
    }); */
});
