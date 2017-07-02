var usuarios = usuarios || (function () {
        var parametros = {};
        //agrego funcion para validar edad
        jQuery.validator.addMethod("mayorA", 
			function(value, element, params) {
			    x = false;
			    if (value != null) {
			    	var haceXAnios = new Date(new Date().setFullYear(new Date().getFullYear() - 18));
					
					var dd = haceXAnios.getDate();
					var mm = haceXAnios.getMonth()+1;
					var yyyy = haceXAnios.getFullYear();
					if(dd<10){
					    dd='0'+dd;
					} 
					if(mm<10){
					    mm='0'+mm;
					}
					var result = yyyy+'-'+mm+'-'+dd;

					x = value < result && '1920-01-01' < value; //por las dudas el 1920
			    }
				return x
			},'Debe ser mayor a {0} años.');


        return {
        	guardar: function(el,id) {    
        		if (this.validar(el)) {
        			console.log('valid() es true')
	        		this.updateUser(id);
	        	} else {
	        		console.log('no se valido');
	        	}
        	},

        	validar: function(el) {
        		var formPadre = el.form;
        		console.log(formPadre);
        		if (formPadre == $("#edit-user-form")) {
        			$(formPadre).validate({
				        rules: {
				            persona_nombres: {
				                minlength: 3,
				                required: true
				            },
				            persona_apellidos: {
				                minlength: 2,
				                required: true
				            },
				            persona_fecha_nac: {
				            	mayorA: 18
				            },
				            persona_direccion: {
				            	required: true
				            },
				            persona_email: {
				            	required: true
				            },
				            persona_celular_codigo: {
				            	required:true,
				            	maxlength: 5
				            },
				            persona_celular: {
				            	required: true,
				            	maxlength: 8
				            }

				        },
				        errorPlacement: function(error, element) {
						    error.insertAfter(element.parentElement);
						},
				        highlight: function (element) {
				            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				        },
				        success: function (element) {
				            element.addClass('valid')
				                .closest('.control-group').removeClass('has-error').addClass('has-success');
				        }
				    });
        		} else if (formPadre == $("#edit-password-form")) {
        			$(formPadre).validate({ 
        				rules :{
        					usuario_password: {
        						required: true,
        						maxlength: 15
        					}
        				},
				        errorPlacement: function(error, element) {
						    error.insertAfter(element.parentElement);
						},
				        highlight: function (element) {
				            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
				        },
				        success: function (element) {
				            element.addClass('valid')
				                .closest('.control-group').removeClass('has-error').addClass('has-success');
				        }
        			})
        		}

			    jQuery.extend(jQuery.validator.messages, {
				    required: "",
				    email: "",
				    date: "",
				    number: "",
				    maxlength: jQuery.validator.format(""),
				    minlength: jQuery.validator.format(""),
				});

			    return $(formPadre).valid();

        	},
        	updateUser: function(id) {
        		
        		var data = $("#edit-user-form").serializeObject();
                $.ajax({
                    data : data,
                    url : 'usuarios/update_user/' + id,
                    type : 'PUT',
					contentType : 'application/x-www-form-urlencoded',
					beforeSend: function() {
						console.log('cargando');
					},
					success: function(response) {
						if (response.exito) {
							var persona = response.result.persona;
							usuarios.mostrarInfo(persona);
						} else {
							alert("crea una cuenta :3");
						}
					}
                })
        	},

        	mostrarInfo: function(persona) {
        		jQuery.each(persona, function(i, val) {
        			$("#persona_"+i).val(val);
        		})
        	}
        }
	}());

