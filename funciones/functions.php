<?php

///////////////////////////////////////
/////registrar scripts y estilos//////
//////////////////////////////////////

function enqueue(){

  wp_register_script('jquery_js', 'https://code.jquery.com/jquery-3.6.0.min.js', array() , time());
  wp_enqueue_script('jquery_js');

  wp_register_style('libreria_style', plugins_url('pluglin-libreria/css/style.css'), array(), time());
  wp_enqueue_style('libreria_style');

  wp_register_style('libreria_datatable', 'https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css',array(), time());
  wp_enqueue_style('libreria_datatable');

  wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), time());
  wp_enqueue_style('bootstrap');


  wp_register_script('bootstraps_scripts', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), time() );
  wp_enqueue_script('bootstraps_scripts');

  wp_register_script('datatables_js', 'https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js', array(), time() );
  wp_enqueue_script('datatables_js');

}

add_action('admin_enqueue_scripts', 'enqueue');

# ==========================
# ========== AJAX ==========
# ==========================
function ajax_register() {
  wp_enqueue_script ('registrar_js', plugins_url('/pluglin-libreria/js/ajax.js'), array('jquery'), time());
  wp_localize_script('registrar_js', 'ajax_var', array(
    'url'    => admin_url('admin-ajax.php'),
    'nonce'  => wp_create_nonce('my-ajax-nonce'),
    'action' => 'event-list'
  ));
}
add_action('admin_enqueue_scripts', 'ajax_register');

add_action('wp_ajax_nopriv_event-list', 'info_complete');
add_action('wp_ajax_event-list', 'info_complete');

add_action('wp_ajax_nopriv_event-list2', 'borrar_curso');
add_action('wp_ajax_event-list2', 'borrar_curso');

add_action('wp_ajax_nopriv_event-list3', 'informacion_curso');
add_action('wp_ajax_event-list3', 'informacion_curso');
