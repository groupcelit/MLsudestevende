var anuncio = anuncio || (function () {
        var parametros = {};
        var click = false;
        return {

            enviar:function () {

                if(anuncio.valid() && !click){
                    click=true;
                    anuncio.save();
                }
            },

            valid: function () {
                if($('[type=file]')[0].files[0] != undefined) {
                    $.each($('[type=file]'), function (e, file) {
                        /*2mb*/
                        if (file.files[0]!= undefined) {
                            if (file.files[0].size > 2000000) {
                                $('#msg').removeClass();
                                $('#msg').addClass('alert alert-warning');
                                $('#msg').html('Esta imagen pesa mas de 2mb :C ' + file.files[0].name);
                                $('#msg').focus();
                                return false;
                            }
                        }
                    });
                }else{
                    $('#msg').removeClass();
                    $('#msg').addClass('alert alert-danger');
                    $('#msg').html('Elige una imagen principal te ayudara a vender');
                    $('#msg').focus();

                    return false;
                }

                return true;
            },

            save: function () {
                var datos = $("#alta_anuncio_form").serializeObject();
                var options = {
                    data: datos,
                    beforeSend: function (){
                        console.log('enviado datos');
                    },
                    success: function (response) {
                        if(response.exito) {
                            click = false;
                            $('#msg').removeClass();
                            $('#msg').addClass('alert alert-success');
                            $('#msg').html('Gracias por publicar');
                            $('#msg').focus();
                            $('#save').remove();
                            setTimeout(
                                function(){
                                    window.location.href = "/mis_anuncios"
                                }
                                ,1500)

                        }else{
                            click = false;
                            $('#msg').removeClass();
                            $('#msg').addClass('alert alert-warning');
                            $('#msg').html('Ops ocurrio un error inesperado');
                            $('#msg').focus();
                        }
                    },
                    error: function(e){
                        click = false;
                        $('#msg').removeClass();
                        $('#msg').addClass('alert alert-warning');
                        $('#msg').html('Ops ocurrio un error inesperado');
                        $('#msg').focus();
                    }
                };
                var url = 'anuncios/new_anuncio';
                $("#alta_anuncio_form").attr("action",url);
                $("#alta_anuncio_form").ajaxSubmit(options);

            },

            getSubCategorias: function(){
                data=$('[name=categoria_id]').serializeObject();
                $.ajax({
                    data :data,
                    url : '/subcategorias/getSubCategorias',
                    type : 'POST',
                    success: function(response) {
                        $('[name=subcategoria_id] option').remove();
                        $.each(response,function(e,data){
                            $('[name=subcategoria_id]').append('<option value='+data.id+'>'+data.nombre+'</option>');
                        })
                    }
                })
            }
        }
    }());