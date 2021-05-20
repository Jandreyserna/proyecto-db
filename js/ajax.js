jQuery(document).ready(function ($) {
console.log('ready');
//--------------------------------------------//
//-------------tabla con ajax-----------------//
//--------------------------------------------//

		// var tabla = $('#tabla1').DataTable({
		//  language: {
		// 	 url:'../wp-content/plugins/pluglin-libreria/js/Spanish.json'
		//  }
	 // });

	 $('#tabla-cursos').DataTable({
		language: {
			url:'../wp-content/plugins/pluglin-libreria/js/Spanish.json'
		}
	});

	 //--------------------------------------------//
	 //-------BOTON DE INFO COMPLETA CON AJAX------//
	 //--------------------------------------------//

      $("#tabla1").on("click", ".info_complete", function(){

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
                    jQuery('.contenedor-search').html(result);
                }
				    });
      });

			//--------------------------------------------//
	 	 //-------BOTON2 DE borrar_curso COMPLETA CON AJAX------//
	 	 //--------------------------------------------//

			$("#tabla-cursos").on("click", ".borrar_curso", function(){

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

});
