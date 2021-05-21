<?php

/**
 *
 */
class Modelo_libro
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
    global $wpdb;
    $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
    $this->nombre_tabla = 'lb_libros';
  }

  function id_nombre_libro(){
    $informacion = $this->wpdb->get_results(
          "SELECT  IdLibro,Nombre
          FROM `{$this->nombre_tabla}`
          ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }
}
