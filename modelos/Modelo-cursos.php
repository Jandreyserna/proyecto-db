<?php

class Modelo_cursos
{
  public $wpdb;
  public $nombre_tabla;
  public $key_foreaneas = null;

  function __construct()
  {
      global $wpdb;
      $this->wpdb = $wpdb; # dejamos el wpdb como global dentro de el archivo modelo.php
      $this->nombre_tabla = 'lb_cursos';
      #$this->get_key_foreaneas();
  }


  function informacion_tabla()
  {
    $informacion = $this->wpdb->get_results(
          "SELECT lb_cursos.IdCurso, lb_profesores.Nombre, lb_cursos.Nombre AS NombreCurso,
           lb_libros.Nombre AS NombreLibro
            FROM lb_libros INNER JOIN lb_cursos INNER JOIN lb_profesores
            WHERE lb_cursos.IdCurso = lb_libros.IdCurso AND lb_profesores.IdProfesor = lb_cursos.IdProfesor",
           'ARRAY_A'
         );
    return (isset($informacion[0])) ? $informacion : null;
  }
}
