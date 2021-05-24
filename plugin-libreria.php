<?php
/*
Plugin Name: libreria
Description: Este plugin sirve para gestionar una base de datos de una libreria.
Version: 0.1
Author: Jandrey Steven Serna - Elsa Carolina Pelaez
License: private
*/

require_once dirname(__FILE__) . '/modelos/General.php';
require_once dirname(__FILE__) . '/modelos/Modelo-estudiantes.php';
require_once dirname(__FILE__) . '/modelos/Modelo-promotor.php';
require_once dirname(__FILE__) . '/modelos/Modelo-cursos.php';
require_once dirname(__FILE__) . '/modelos/Modelo-libros.php';
require_once dirname(__FILE__) . '/modelos/Modelo-profesor.php';
require_once dirname(__FILE__) . '/funciones/funciones_post.php';
require_once dirname(__FILE__) . '/funciones/functions.php';
require_once dirname(__FILE__) . '/funciones/functions_ajax.php';

add_action('init', 'lbr_init', 0);
function lbr_init() {
  add_action('admin_menu', 'lbr_admin_estudiante');
  add_action('admin_menu', 'lbr_admin_curso');

}

function lbr_admin_estudiante(){
  add_menu_page(
    'Estudiantes',
    'Estudiantes',
    'administrator',
    'estudiantes',
    'vista_estudiantes',
    'dashicons-buddicons-buddypress-logo',
    3
  );
}

function vista_estudiantes(){
  $modelo_estudiantes = new Modelo_general('lb_estudiantes');
  require_once dirname(__FILE__) . '/vistas/estudiantes.php';
}

function lbr_admin_curso(){
  add_menu_page(
    'Cursos',
    'Cursos',
    'administrator',
    'cursos',
    'vista_cursos',
    'dashicons-admin-page',
    4
  );
}

function vista_cursos(){
  $modelo_cursos = new Modelo_general('lb_cursos');
  require_once dirname(__FILE__) . '/vistas/cursos.php';
}

function lbr_admin_eventos(){
  add_menu_page(
    'Eventos',
    'Eventos',
    'administrator',
    'eventos',
    'vista_eventos',
    'dashicons-calendar-alt',
    5
  );
}


function vista_eventos(){
  require_once dirname(__FILE__) . '/vistas/eventos.php';
}
