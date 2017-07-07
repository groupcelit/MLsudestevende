/*========================================
          TODO:Agrego imagenes
========================================*/
$(window).load(function(){
    $(document).on('click', '.browse', function(){
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    $(document).on('change', '.file', function(){
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });

    /*Agrego nueva fila de imagen boton*/
    $(document).on('click', '#alta_anuncio_form .add_image', function(){
        var html='';
        html="<div class='col-sm-8 col-sm-offset-2'>" +
                "<input type='file' name='img[]' class='file'>" +
                "<div class='input-group col-xs-12 span-with-bg'>" +
                    "<span class='input-group-addon'><i class='glyphicon glyphicon-picture'></i></span>" +
                    "<input type='text' class='form-control' disabled placeholder='Selecciona una imagen'>" +
                    "<span class='input-group-btn'>" +
                        "<button class='browse btn btn-primary' type='button'>" +
                             "<i class='glyphicon glyphicon-search'></i> Browse" +
                        "</button>" +
                        "<button class='btn btn-success add_image' type='button'>" +
                             "<i class='glyphicon glyphicon-plus' aria-hidden='true'></i>" +
                        "</button>"+
                    "</span>" +
                "</div>" +
             "</div>";
        $(this).remove();
        $('#update_imagenes').append(html);
    });

});