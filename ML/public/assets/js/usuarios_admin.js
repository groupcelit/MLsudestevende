var usuarios_admin = usuarios_admin || (function () {
	    $(document).ready(function() {
    		$('.checkbox').change(function () {
			    usuarios_admin.validar($('input',this)[0])
			 });

	    });
		
        return {
        		validar: function(el) {

        			if ($(el.form).valid()) {
        				var data = {id : el.id};

			            $.ajax({
			                data : data,
			                url : '/usuarios_admin/update_premium',
			                type : 'PUT',
							contentType : 'application/x-www-form-urlencoded',
							success: function(response) {
								if (response.exito) {
									console.log("exito");
								} else {
									console.log("fallo");
								}
							}
			            })
        			}

        		},
        		borradoadmin: function(usuario) {
        			var data = {user: usuario};
        			if (confirm('Esta seguro que quiere eliminar al usuario?')) {
	        			$.ajax({
	        				data : data,
				                url : '/usuarios_admin/delete_user_admin',
				                type : 'PUT',
								contentType : 'application/x-www-form-urlencoded',
								success: function(response) {
									if (response.exito) {
										console.log("exito");
										location.reload();
									} else {
										console.log('fallo');
									}
								}
	        			})
	        		}
        		},
        		filtrarLista: function() {
        			var input, filter, ul, li, a, b, c, i, content;
				    input = document.getElementById('usuario_search');
				    filter = input.value.toUpperCase();
				    ul = document.getElementById("listaUser");
				    li = ul.getElementsByTagName('li');

				    for (i = 0; i < li.length; i++) {

				        a = li[i].getElementsByClassName("container")[0];
				        b = a.getElementsByClassName('username')[0]
				        c = b.getElementsByClassName('item_details')[0]
				        
				        if (c.innerHTML.toUpperCase().indexOf(filter) > -1) {
				            li[i].style.display = "";
				        } else {
				            li[i].style.display = "none";
				        }
				    }
        		}
        	}
	}());