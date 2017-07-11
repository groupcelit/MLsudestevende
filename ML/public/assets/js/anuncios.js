var anuncios = anuncios || (function () {

        return {
        	getAnuncio: function(anuncioid, usuarioid) {
        		var data = {
        			anuncio_id : anuncioid,
        			usuario_id : usuarioid
        		};
        		$.ajax({
                    data : data,
                    url : '/anuncios/get_anuncio',
                    type : 'PUT',
					contentType : 'application/x-www-form-urlencoded',
					beforeSend: function() {
						$("#editar_anuncio_button").attr('class','btn btn-warning');
						$("#editar_anuncio_button").attr("value","Cargando");
					},
					success: function(response) {
						if (response.exito) {
							
						} else {
							alert("Hubo un error, intentelo de nuevo");
							window.location.replace("/registrandome");
						}
					}
                })
        	}
        }
	}());



