<?php
class Modelo_matricula
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'lb_matriculados';
  }

  function informacion_tabla(){
    $informacion = $this->wpdb->get_results(
          "SELECT IdCurso , IdEstudiante, Nota  
            FROM lb_matriculados ",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }

}
