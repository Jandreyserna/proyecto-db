jQuery(document).ready(function ($) {

//--------------------------------------------//
//-------------tabla con ajax-----------------//
//--------------------------------------------//

		var tabla = $('#tabla1').DataTable({
		 language: {
			 url:'../wp-content/plugins/pluglin-libreria/js/Spanish.json'
		 }
	 });

	 $('#tabla2').DataTable({
		language: {
			url:'../wp-content/plugins/pluglin-libreria/js/Spanish.json'
		}
	});

	 //--------------------------------------------//
	 //-------BOTON DE INFO COMPLETA CON AJAX------//
	 //--------------------------------------------//

      // $("#tabla1").on("click", ".info_complete", function(){
      //
			// 	var padre = $(this).closest("tr");
			// 	var id = $('.sorting_1', padre).text();
      //
			// 	console.log(id);
      //
			// 	jQuery.ajax({
      //           type: "post",
      //           url: ajax_var.url,
      //
      //           data: {
      //               'action' : ajax_var.action,
      //               'nonce'  : ajax_var.nonce,
			// 							'id'     : id
      //           },
      //           success: function(result){
      //               console.log('Todo ok.');
      //               jQuery('.contenedor-search').html(result);
      //           }
			// 	    });
      // });

});
