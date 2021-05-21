<?php

/**
 *
 */
class Modelo_profesor
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
    global $wpdb;
    $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
    $this->nombre_tabla = 'lb_profesores';
  }

  function id_nombre_profesor(){
    $informacion = $this->wpdb->get_results(
          "SELECT  IdProfesor,Nombre,Apellidos
          FROM `{$this->nombre_tabla}`
          ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }
}
