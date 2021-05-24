jQuery(document).ready(function ($) {
console.log('ready');
//--------------------------------------------//
//-------------tabla con ajax-----------------//
//--------------------------------------------//

		$('#tabla-estudiantes').DataTable({
		 language: {
			 url:'../wp-content/plugins/proyecto-db/js/Spanish.json'
		 }
	 });

	 $('#tabla-cursos').DataTable({
		language: {
			url:'../wp-content/plugins/proyecto-db/js/Spanish.json'
		}
	});

	 //--------------------------------------------//
	 //-------BOTON DE INFO COMPLETA CON AJAX------//
	 //--------------------------------------------//

      $("#tabla-estudiantes").on("click", ".borrar-estudiante", function(){

				var padre = $(this).closest("tr");
				var id = $('.sorting_1', padre).text();

				console.log(id);

				jQuery.ajax({
                type: "post",
                url: ajax_var.url,

                data: {
                    'action' : ajax_var.action,
                    'nonce'  : ajax_var.nonce,
										'id'     : id
                },
                success: function(result){
                    console.log('Todo ok.');
										window.location.reload(true);
                    // jQuery('.ajax-student').html(result);
                }
				    });
      });

			$("#tabla-estudiantes").on("click", ".info-estudiante", function(){

				 var padre = $(this).closest("tr");
				 var id = $('.sorting_1', padre).text();

				console.log(id);

				jQuery.ajax({
                type: "post",
                url: ajax_var.url,

                data: {
                    'action' : 'informacion-completa',
									  'id'     : id
                },
                success: function(result){
                    console.log('Todo ok.');
										// window.location.reload(true);
                     jQuery('.ajax-student').html(result);
                }
				    });
      });

			//--------------------------------------------//
	 	 //-------BOTON2 DE borrar_curso COMPLETA CON AJAX------//
	 	 //--------------------------------------------//

			$("#tabla-cursos").on("click", ".borrar-curso", function(){

				 var padre = $(this).closest("tr");
				 var id = $('.sorting_1', padre).text();

				console.log(id);

				jQuery.ajax({
                type: "post",
                url: ajax_var.url,

                data: {
                    'action' : 'event-list2',
                    'nonce'  : ajax_var.nonce,
									  'id'     : id
                },
                success: function(result){
                    console.log('Todo ok.');
										window.location.reload(true);
                    // jQuery('.resultado-borrar').html(result);
                }
				    });
      });

			$("#tabla-cursos").on("click", ".info-curso", function(){

				 var padre = $(this).closest("tr");
				 var id = $('.sorting_1', padre).text();

				console.log(id);

				jQuery.ajax({
                type: "post",
                url: ajax_var.url,

                data: {
                    'action' : 'event-list3',
                    'nonce'  : ajax_var.nonce,
									  'id'     : id
                },
                success: function(result){
                    console.log('Todo ok.');
										// window.location.reload(true);
                     jQuery('.resultado-informacion').html(result);
                }
				    });
      });

});
